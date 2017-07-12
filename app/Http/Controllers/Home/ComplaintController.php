<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplaintController extends Controller
{
    //主页
	public function index(){

		return view('home.complaint.index');
	}

	// 执行添加
	public function insert(Request $request){

		$this->validate($request,[
				'content' => 'required',
			],[
				'content.required' => '请输入你提交的问题',
			]);

		$data = $request->except('_token');

		// $data['uid'] = session('user')->id;
		$data['uid'] = 1;


		$res = \DB::table('complaint')->insert($data);

		if ($res){
			// return redirect('/');
			return back()->with(['info' => '添加成功']);
		}else{
			return back()->with(['info' => '添加失败']);
		}

	}
}
