<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //登录页面方法
    public function login(){

    	//判断session是否存在
    	if(session('user')){

    		//存在跳转首页
    		return redirect('/admin/index', ['title' => '主页']);
    	}
    	//引入登录页面
    	return view('home.login.login');
    }

    //执行登录
    public function dologin(Request $request){
    	
    	//获取cookie
    	$remember_token = \Cookie::get('remember_token');

    	//判断
    	if($remember_token){

    		//查询数据库
    		$user = \DB::table('user')->where('remember_token',$remember_token)->first();

    		//将查询到的数据存入session
    		session(['user'=>$user]);
    		
    		//重定向
    		return redirect('/');
    	}

    	//筛选数据
    	$data = $request->except('_token');

    	//去数据库查询密码
    	$res = \DB::table('user')->where('username',$request->username)->orwhere('email',$request->username)->orwhere('phone',$request->username)->first();

    	//获取密码
    	$password = $data['password'];

    	//生成最后登录时间
    	$data['lastlogin'] = time();

    	//存储旧的输入数据
    	$request->flash();

    	//获取数据库中已经加密的密码
    	$oldpassword = $res->password;
    
    	//判断哈希解密
    	if (!\Hash::check($password, $oldpassword)) {
    		
    		//重定向并返回错误信息
  			return back()->with(['info'=>'用户名或密码错误']);
		}
		//将用户数据存入session
		session(['user'=>$res]);

		//判断是否记住我
		if($request->input('remember_me')){

			//存入cookie
			\Cookie::queue('remember_token', $res->remember_token, 10);
		}
		
		//重定向
		return redirect('/');
		
    }

    public function ajax(Request $request){

    	//验证该用户是否存在
    	$username = $request->username;

    	$res = \DB::table('user')->where('username',$username)->orwhere('email',$username)->orwhere('phone',$username)->first();

    	//返回状态值1：该用户存在 2：该用户不存在
    	if($res){
    		return response()->json('1');
    	}else{
    		return response()->json('2');
    	}
    }


    public function outlogin(Request $request){

        //销毁session
        $request->session()->forget('user');

        //重定向
        return back()->with(['info'=>'退出成功']);
    }
}
