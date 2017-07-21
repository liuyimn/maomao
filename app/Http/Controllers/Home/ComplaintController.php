<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplaintController extends Controller
{
    // 投诉执行页面
	public function index(){

		// 判断用户是否登陆
		if(!session('user')){
			return redirect('home/login/index')->with(['info' => '请登录']);
		}

		return view('home.complaint.index');
	}

	// 执行添加
	public function insert(Request $request){

		// 判断session是否存在,不在跳到登陆页面
		if(!session('user')){
			return redirect('home/login/index');
		}

		// 验证字段
		$this->validate($request,[
				'content' => 'required',
			],[
				'content.required' => '请输入你提交的问题',
			]);

		// 过滤字段
		$data = $request->except('_token');

		// 赋值用户id
		$data['uid'] = session('user')->id;

		// 执行添加
		$res = \DB::table('complaint')->insert($data);

		// 判断是否添加成功
		if ($res){
			
			return back()->with(['info' => '反馈成功']);
		}else{
			return back()->with(['info' => '反馈失败']);
		}

	}

}
