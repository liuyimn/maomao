<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendlinkController extends Controller
{	

	/**
		@parm $num获取分页的页码
		@parm $keywords进行模糊搜索填写的关键字
		@parm $data 查询数据库返回的数据
	*/
    //展示主页方法
    public function index(Request $request){

        //缓存
        $data = \Cache::remember('friendlink',10,function(){

            return \DB::table('friendlink')->get();
        });

    	//引入加载页面
    	return view('admin.friendlink.index',['title'=>'友情链接主页','data'=>$data]);
    }

    public function add(){
    	return view('admin.friendlink.add',['title'=>'添加友情链接']);
    }

    /**
		@parm $request包含了所有提交的数据 
		@parm $extension图片后缀扩展名
		@parm $filaname 图片名
		@parm $res 添加数据后返回的状态值

		@return 重定向
	*/
    public function insert(Request $request){

    	$data = $request->except('_token');
    		
    	//判断该位置是否已经存在
    	$num = $data['ordernum'];
    	
    	$all = \DB::table('friendlink')->get();

    	//迭代判断该位置是否有链接
    	foreach($all as $k => $v){
    		if($num == $v->ordernum){
    			return back()->with(['info'=>'该位置已经有链接，请重新选择']);
    		}
    	}

    	$this->validate($request,[
    		'linkname' => 'required',
    		'url' => 'required',
    		'content' => 'required',
    		'logo' => 'image',
		],[
			'linkname.required' => '友情链接名不能为空',
			'url.required' => '友情链接地址不能为空',
			'content.required' => '友情链接描述不能为空',
			'logo.image' => '请选择正确的文件类型',
		]);



    	//判断是否提交有效图片
		if($request->hasFile('logo')){

			if($request->file('logo')->isValid()){

				//获取扩展名
				$extension = $request->file('logo')->extension();

				//设置图片名
				$filename = time().mt_rand(000000,999999).'.'.$extension;

				//设置路片移动路径
				$request->file('logo')->move('./uploads/avatar',$filename);

				//将图片名压入数组
				$data['logo'] = $filename;
			}
		}
    	
    	//将准备好的数据添加到数据库中
    	$res = \DB::table('friendlink')->insert(
    			$data
    		);

    	//判断是否添加成功并重定向
    	if($res){
            \Cache::forget('friendlink');
            \Cache::remember('friendlink',10,function(){
                return \DB::table('friendlink')->get();
            });
    		return redirect('/admin/friendlink/index')->with(['info'=>'恭喜您：添加成功']);
    	}else{
    		return back()->with(['info'=>'对不起：添加失败']);
    	}
    }

    /**
		@parm $id 要编辑的该条数据的id
    */
    //编辑友情链接方法
    public function edit($id){

    	//根据id获取该条数据
    	$data = \DB::table('friendlink')->where('id',$id)->first();

    	//加载修改友情链接页面
    	return view('admin.friendlink.edit',['title'=>'编辑友情链接','data'=>$data]);
    }

    //执行编辑动作方法
    public function update(Request $request){

    	//获取编辑的id
    	$id = $request->input('id');

    	//获取文件旧名字
    	$oldfilename = \DB::table('friendlink')->where('id',$id)->first()->logo;

    	//获取编辑的数据
    	$data = $request->except('_token','id');

    	$num = $data['ordernum'];
    	
    	$all = \DB::table('friendlink')->get();

    	//迭代判断该位置是否有链接
    	foreach($all as $k => $v){
    		if($num == $v->ordernum){
    			return back()->with(['info'=>'该位置已经有链接，请重新选择']);
    		}
    	}

		$this->validate($request,[
			'linkname' => 'required',
			'url' => 'required',
			'content' => 'required',
			'logo' => 'image',
		],[
			'linkname.required' => '友情链接名不能为空',
			'url.required' => '友情链接地址不能为空',
			'content.required' => '友情链接描述不能为空',
			'logo.image' => '请选择正确的文件类型',
		]);

		//判断图片是否合法
    	if($request->hasFile('logo')){

    		if($request->file('logo')->isValid()){

    			//获取扩展名
    			$extension = $request->file('logo')->extension();

    			//定义图片名
    			$filename = time().mt_rand(000000,999999).'.'.$extension;

    			//文件上传路径
    			$request->file('logo')->move('./uploads/avatar',$filename);

    			//删除原文件操作
    			if(file_exists('./uploads/avatar'.$oldfilename) && $oldfilename != 'default.jpg'){
    				unlink('./uploads/avatar'.$oldfilename);
    			}

    			//将文件名压入数组
    			$data['logo'] = $filename;
    		}
    	}

    	//将准备好的数据修改到数据库
    	$res = \DB::table('friendlink')->where('id',$id)->update(
    			$data
    		);

    	//判断是否修改成功
    	if($res){
    		return redirect('/admin/friendlink/index')->with(['info'=>'恭喜：编辑成功']);
    	}else{
    		return back()->with(['info'=>'编辑失败']);
    	}
    }

    //删除友情链接方法
    public function delete($id){

    	//删除数据库中的该条id的数据
    	$res = \DB::table('friendlink')->where('id',$id)->delete();
    	if($res){
            \Cache::forget('friendlink');
    		return back()->with(['info'=>'恭喜：删除友情链接成功']);
    	}else{
    		return back()->with(['info'=>'抱歉：删除失败']);
    	}
    }
}
