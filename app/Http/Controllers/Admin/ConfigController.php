<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    /**
    	@return 加载网站配置首页
    	@parm  $arr 网站状态数组
    	@parm  $data 存储网站所有配置信息
    */
    //网站配置展示
    public function index(){

    	//定义一个状态数组
    	$arr = ['0'=>'关闭','1'=>'开启'];

    	//将这条数据查出来发送到模板
    	$data = \DB::table('config')->where('id',1)->first();
        
    	// dd($data);
    	return view('admin.config.index',['title'=>'网站配置','data'=>$data,'arr'=>$arr]);
    }

    /**
    	@renturn  加载网站修改
    	@parm  $data 存储网站配置信息
    */
    //编辑网站配置
    public function edit(){

    	//将该条配置信息查到
    	$data = \DB::table('config')->where('id',1)->first();

    	//加载模板并发送信息
    	return view('admin.config.edit',['title'=>'编辑网站配置','data'=>$data]);
    }

    /**
    	@parm  $request 存储所有提交过来的数据
    	@parm  $data    进行筛选后处理后的数据 剔除token验证数据
    	@parm  $res     存储执行修改后返回的执行结果
    */
    //执行编辑动作方法
    public function update(Request $request){

    	//验证表单
    	$this->validate($request,[
    			'webname' => 'required',
    			'keywords' => 'required',
    			'copy' => 'required',
    		],[
    			'webname.required' => '网站名不能为空，请重新输入',
    			'keywords.required' => '网站关键字不能为空，请重新输入',
    			'copy.required' => '网站版权不能为空，请重新输入',
    		]);

    	//获取提交过来的数据
    	$data = $request->except('_token');

    	//获取原来的图片名
    	$oldfilename = \DB::table('config')->where('id',1)->first()->logo;

    	//判断上传的图片是否合法
    	if($request->hasFile('logo')){

    		if($request->file('logo')->isValid()){

    			//获取图片扩展名
    			$extension = $request->file('logo')->extension();

    			//生成图片名
    			$filename = time().mt_rand(000000,999999).'.'.$extension;

    			$request->file('logo')->move('./uploads/config',$filename);

    			//删除原文件
    			if(file_exists('./uploads/avatar'.$oldfilename) && $oldfilename != 'default.jpg'){
    				unlink('./uploads/avatar'.$oldfilename);
    			}

    			$data['logo'] = $filename;
    		}
    	}

    	//执行修改编辑
    	$res = \DB::table('config')->where('id',1)->update(
    			$data
    		);

    	//判断是否修改成功
    	if($res){

    		//执行成功，重定向到展示页
    		return redirect('/admin/config/index')->with(['info'=>'恭喜，修改成功']);
    	}else{

    		//执行失败，返回
    		return back()->with(['info'=>'抱歉，网站配置修改失败，请重新添加']);
    	}
    }

    public function change($status){

    	//判断传递过来的状态值是什么，如果为0修改为1，如果为1 修改为0 0代表维护 1代表正常
    	if($status == 0){

    		//执行修改配置状态
    		$res = \DB::table('config')->where('id',1)->update(['status'=>1]);

    	//如果状态为1 修改为0
    	}else if($status == 1){

    		//执行修改配置状态
    		$res = \DB::table('config')->where('id',1)->update(['status'=>0]);
    	}

    	//判断是否修改成功
    	if($res){	
    		return back()->with(['info'=>'修改成功']);
    	}else{
    		return back()->with(['info'=>'修改失败']);
    	}

    }
}
