<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // 引入页面
    public function login(){

    	return view('admin.login.login');
    }

    // 执行登陆
     public function doLogin(Request $request){

    
        
    	$data = $request->except('_token');
    	// 验证是否记住我
    	$remember_token = \Cookie::get('remember_token');

    	if($remember_token) 
    	{
    		$admin = \DB::table('user')->where('remember_token', $remember_token)->first();

    		//  存session
    		session(['master' => $admin]);

    		return redirect('/admin/index')->with(['info' => '登录成功']);
    	}
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            ],[
            'username.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
            ]);

    	// 验证码是否正确
    	// $code = session('code');
    	// if($code != $data['code'])
    	// {
    	// 	return back()->with(['info' => '验证码错误']);
    	// }

    	// 查询用户
    	$user = \DB::table('user')->where('username', $data['username'])->first();

        // dd($user);
        // 对用户进行
        if(isset($user->auth) && $user->auth < 2){
            return back()->with(['info' => '对不起你没有权限登录']);
        }

    	// 判断
    	if(!$user){
    		return back()->with(['info' => '该管理员不存在']);	
    	}

    	// 对密码解密并进行对比

        if(!\Hash::check($data['password'], $user->password))
        {
            return back()->with(['info' => '用户名或密码错误']);
        }


    	// 更新登录时间
    	$lastlogin = time();

    	// 修改到数据库
        \DB::table('user')->where('id', $user->id)->update(['lastlogin' => $lastlogin]);


    	// 将用户数据存入session
    	session(['user' => $user]);

    	// 写入cookie
    	if($request->input('remember_me')) 
    	{
    		\Cookie::queue('remember_token', $user->remember_token, 10);
    	}

        // 查找用户详情
        $detail = \DB::table('userdetail')->where('uid', $user->id)->first();

        // 将用户数据存入session
        session(['detail' => $detail]);

        // 判断用户是否被禁用
        if($user->status == 1){
            return back()->with(['info' => '你没有权限登陆']);
        }

    	// 跳转到后台主页
    	return redirect('/admin/index')->with(['info' => '登录成功']);
	
    }

    // logout退出登录
    public function logout(Request $request)
    {
        $request->session()->forget('master');
        return redirect('/admin/login')->with(['info' => '退出成功']);
    }

}
