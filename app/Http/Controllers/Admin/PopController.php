<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PopController extends Controller
{	
	/**
		@parm $request 发送的数据集合
		@return $data 数据库查询出的所有数据（活动表） $request 数据集合 $arr 定义状态值的数组 
    */
    //加载活动展示页
    public function index(Request $request){

    	//获取页码数 默认为10
    	$num = $request->input('num',10);

    	//获取搜索关键字 默认为空
    	 $keywords = $request->input('keywords','');

    	$data = \DB::table('pop_list')->where('content','like','%'.$keywords.'%')->paginate($num);

    	$arr = ['0'=>'正常','1'=>'下线'];

    	return view('admin.pop.index',['title'=>'活动列表','data'=>$data,'arr'=>$arr,'request'=>$request->all()]);

    }

    //加载添加活动页面
    public function add(){
    	return view('admin.pop.add',['title'=>'活动添加']);
    }

    /**
		@parm $request 发送的数据集合
		@return  页面重定向返回结果
    */

    //添加活动动作控制器
    public function insert(Request $request){

    	//获取用户提交过来的规则 内容等数据放入$data中
    	$data = $request->except('_token');
    	
    	$this->validate($request,[
    			'rule' => 'required',
    			'content' => 'required',
    			'pic' => 'image|required',
    		],[
    			'rule.required' => '活动规则不能为空',
    			'content.required' => '活动内容不能为空',
    			'pic.image' => '请上传图片格式',
    			'pic.required' => '请上传图片',
    		]);

    	//判断图片是否上传成功
    	if($request->hasFile('pic')){

    		if($request->file('pic')->isValid()){

    			//获取扩展名
    			$extension = $request->file('pic')->extension();

    			//设置图片名 由随机数加时间戳组成
    			$filename = time().mt_rand(000000,999999).'.'.$extension;

    			//设置图片上传到本地位置
    			$request->file('pic')->move('./uploads/avatar',$filename);

    			//将图片名压入数组
    			$data['pic'] = $filename;
    		}
    	}

    	//添加到数据库
    	$res = \DB::table('pop_list')->insert($data);
    	
    	//判断是否添加成功
    	if($res){
    		return redirect('/admin/pop/index')->with(['info'=>'添加活动成功']);
    	}else{
    		return back()->with(['info'=>'添加活动失败，请检查']);
    	}
    }	

    /**
		@param $status 状态值 1 为下线 0 为普通
		@parm  $id 当前活动的id
    */

    //修改活动状态的方法
    public function upp($id,$status){

    	//判断当前状态值
    	if($status == 0){

    		//如果当前活动状态为0，修改数据库中的状态值为1 
    		$res = \DB::table('pop_list')->where('id',$id)->update(['status'=>1]);

	    }else if($status == 1){
	    	//如果当前活动状态为1，修改数据库中的状态值为0 
	    	$res = \DB::table('pop_list')->where('id',$id)->update(['status'=>0]);
	    }

	    //判断修改是否成功
	    if($res){
	    	return back()->with(['info'=>'状态修改成功']);
	    }else{
	    	return back()->with(['info'=>'状态修改失败']);
	    }
	}

	/**
		@param $id 删除活动的活动id号
		@return 页面重定向返回结果
	*/
	//删除活动
	public function delete($id){

	 	//将活动从数据库删除
	 	$res = \DB::table('pop_list')->where('id',$id)->delete();

	 	//判断是否删除成功
	 	if($res){
	 		return back()->with(['info'=>'删除活动成功']);
	 	}else{
	 		return back()->with(['info'=>'删除活动失败']);
	 	}
	}

	/**
		@parm $id 编辑指定id的活动
		@return $data 该条id查询的数据，并发送到页面 $data 的数据是一个对象类型
	*/
	//加载编辑活动页面
	public function edit($id){

		//根据id查询数据库中该条id号的数据
		$data = \DB::table('pop_list')->where('id',$id)->first();

		//加载编辑活动页面，并发送标题，该条id号的数据
		return view('admin.pop.edit',['title'=>'活动编辑','data'=>$data]);
	}

	public function update(Request $request){

		$data = $request->except('_token','_id');

		$id = $request->input('id');

		$this->validate($request,[
    			'pic' => 'image',
    		],[
    			'pic.image' => '请上传图片格式',
    		]);

		//获取原来的图片名
    	$oldfilename = \DB::table('pop_list')->where('id',$id)->first()->pic;

		//判断是否上传有效图片
		if($request->hasFile('pic')){

			if($request->file('pic')->isValid()){

				//获取扩展名
				$extension = $request->file('pic')->extension();

				//拼接图片名
				$filename = time().mt_rand(000000,999999).'.'.$extension;

				//移动文件
				$request->file('pic')->move('./uploads/pop',$filename);

				//删除原文件
    			if(file_exists('./uploads/avatar'.$oldfilename) && $oldfilename != 'default.jpg'){
    				unlink('./uploads/avatar'.$oldfilename);
    			}

				//将图片名压入数组中
				$data['pic'] = $filename;
			}
		}

		//将数据修改入数据库
		$res = \DB::table('pop_list')->where('id',$id)->update(
				$data
			);

		if($res){
			return redirect('/admin/pop/index')->with(['info'=>'恭喜：编辑活动成功']);
		}else{
			return back()->with(['info'=>'对不起：编辑活动失败，请检查']);
		}


	}
}
