<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertController extends Controller
{
    /**
    *   @return   加载网站广告页
    *   @param     $data广告页的所有信息
    *   @param     $arr 状态数组
    */
    //加载广告页面主页
	public function index(){

		// 查询数据库
		$data = \DB::table('advert')->get();

		$arr = [0 => '开启', 1 => '关闭'];

		return view('admin.advert.index', ['title' => '广告列表', 'data' => $data, 'arr' => $arr]);
	}	

    /**
    *   @return   加载网站添加广告页
    */
	//加载广告添加页面
	public function add(){

		//引入页面
		return view('admin.advert.add',['title'=>'添加广告']);
	}

    /**
    *   @return 页面重定向返回结果
    *   @param   $request 发送过来的结果集
    */
	// 执行添加
	public function insert(Request $request){
		
		//检测是否合法
        $this->validate($request, [
                'title' => 'required|unique:advert|min:6|max:18',
                'connect' => 'required',
                'e_time' => 'required|date',
                's_time' => 'required|date',
                'pic' => 'required|image',
            ],[
                'title.min' => '标题最短6个字符',
                'title.max' => '标题最长18个字符',
                'title.required' => '标题不能为空',
                'title.unique' => '标题已存在',
                'pic.required' => '广告图片不能为空',
                'pic.image' => '必须上传图片',
                'e_time.required' => '广告结束时间不能为空',
                's_time.required' => '广告开始时间不能为空',
                'e_time.date' => '广告结束时间必须是时间格式',
                's_time.date' => '广告开始时间必须是时间格式',
                'connect.required' => '广告描述不能为空',
            ]);

        // 过滤字段
        $data = $request->except('_token');

        // 处理图片
        if($request->hasFile('pic')){

            if($request->file('pic')->isValid()){

                // 获取扩展名
                $ext = $request->file('pic')->extension();
                // dd($ext);
                // 随机文件名
                $filename = time().mt_rand(1000000,9999999).'.'.$ext;
                // 移动
                $request->file('pic')->move('./uploads/advert',$filename);

                $data['pic'] = $filename;
            }
        }
        
        // 执行添加
        $res = \DB::table('advert')->insert($data);

        // 判断
        if($res){
            return redirect('/admin/advert/index')->with(['info' => '添加成功']);
        }else{
            return back()->with(['info' => '添加失败']);

        }

	}

    /**
    *   @param    $status状态值为1位禁用为0开启
    *   @param     $id发送过来的id    
    */
	// 修改权限
	public function upstatus($id, $status){

		// 判断
		if($status == 1){

			// 修改stutus等于1的 
			$res = \DB::table('advert')->where('id', $id)->update(['status' => 0]);
			
		}else if($status == 0){
			// 修改状态
			$res = \DB::table('advert')->where('id', $id)->update(['status' => 1]);
		
		}

		// 判断是否修改成功 
		if ($res) {
			return back()->with('状态修改成功');
		}else{
			return back()->with('状态修改失败');
		}
	}

    /**
    *   @return    加载广告修改页
    *   @param      $id 发送过来要修改的id
    *   @param      $data 查询到要修改的数据
    */
	// 修改页面
	public function edit($id){
		
		// 查找要修改的数据
		$data = \DB::table('advert')->where('id', $id)->first();

		// 把查询到的数据发送到页面
		return view('admin.advert.edit', ['title' => '广告修改', 'data' => $data]);
	}

    /**
    *   @return    页面重定向返回结果
    *   @param      $request 发送过来的结果集
    */
	// 执行修改
	public function update(Request $request){
		
		// 过滤字段
		$data = $request->except('_token', 'id');

        // 查询老图片
        $oldAvatar = \DB::table('advert')->where('id', $request['id'])->first()->pic;

        // 判断图片是否合法
        if($request->hasFile('pic')) 
        {
            if($request->file('pic')->isValid()) 
            {
                // 获取扩展名
                $ext = $request->file('pic')->extension();
                // dd($ext);
                // 随机文件名
                $filename = time().mt_rand(1000000,9999999).'.'.$ext;
                // 移动
                $request->file('pic')->move('./uploads/advert', $filename);

                // 删除老图片
                if(file_exists('./uploads/advert/'.$oldAvatar) && $oldAvatar != 'default.jpg')
                {
                    unlink('./uploads/advert/'.$oldAvatar);
                }

                // 添加data数据
                $data['pic'] = $filename;
            }
        }
        
        
        // 执行修改
        $res = \DB::table('advert')->where('id', $request->id)->update($data);

        // 判断是否修改成功
        if($res){
            return redirect('/admin/advert/index')->with(['info' => '更新成功']);
        }else{
            return back()->with(['info' => '更新失败']);
        }

	}

    /**
    *   @return    页面重定向返回结果
    *   @param     $id 发送过来要删除的id
    */
	// 执行删除页
	public function delete($id){
		
		// 删除
		$res = \DB::table('advert')->where('id', $id)->delete();
        if($res)
        {
            return redirect('/admin/user/index')->with(['info' => '删除成功']);
        }else
        {
            return back()->with(['info' => '删除失败']);
        }
	}

}
