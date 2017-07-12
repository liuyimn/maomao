<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
    @description 通过邮件发送找回密码
    @auth 李硕
    @version 2017/7/11
    @modify
*/

class ForgetController extends Controller
{
    //忘记密码 
    public function forget(){

    	return view('home.forget.forget');
    }

    /**
        @description 邮件发送并跳转到邮箱
        @author 李硕
        @version 2017/7/11
        @parm $request 填写的数据
        @parm $data 进行筛选后的数据
        @parm session('code') 验证码
        @parm $res 查询数据库返回的数据
        @parm $mail 处理邮箱地址后缀存放的变量
        @return 重定向并将处理好的邮箱地址后缀发过去
    */
    //执行动作方法
    public function doforget(Request $request){

    	//获取传递输入的值
    	$data = $request->except('_token');

    	//验证验证码是否正确
    	if(session('code') != $data['code']){

    		//重定向
    		return back()->with(['info'=>'验证码错误']);

    	}

    	$res = \DB::table('user')->where('email',$data['email'])->first();

    	if($res){
    		//发送邮件
    		\Mail::send('home.mail.mail', ['res'=>$res], function($message) use($data){

    			//要发送的邮件地址
		    	$message->to($data['email']);

		    	//标题
		    	$message->subject('大脸猫二手交易-找回密码');
	    	});
	    }

        //处理邮箱后缀
        $mail = strstr($data['email'], '@');

        $mail = ltrim($mail, '@');

        return view('home.forget.success', ['mail'=>$mail]);
    }

  
    /**
        @description 验证邮箱ajax
        @author 李硕
        @version 2017/7/11
        @parm $request 填写的数据
        @parm $data 邮箱
        @parm $res 查询数据库返回结果
    */
    //检查邮箱是否存在ajax
    public function ajax(Request $request){

    	//接收输入的email
    	$data = $request['email'];

    	//查询数据库中是否存在
    	$res = \DB::table('user')->where('email',$data)->first();

    	//判断
    	if($res){

    		//如果存在返回1，验证通过
    		return response()->json('1');
    	}else{

    		//不存在返回2，邮箱不存在
    		return response()->json('2');
    	}
    }

    /**
        @description 验证邮箱token
        @author 李硕
        @version 2017/7/11
        @parm $token token值
        @parm $res 查询数据库返回结果
    */
    //验证token
    public function link($token){

    	//判断token是否合法
    	$res = \DB::table('user')->where('remember_token',$token)->first();

        //判断
    	if($res){

            //跳转重置密码页面
            return redirect('/home/newpass/'.$res->id);
    	}else{

            //阻止跳转重定向并返回错误信息
    		return redirect('/home/info')->with(['info'=>'不是一个合法的来源,请重新输入']);
    	}
    }

    //提示不合法消息路由
    public function info(){

        return view('home.forget.info');
    }

    //修改密码模板
    public function newpass($id){

        //重定向页面并发送id
    	return view('home.forget.newpass',['id'=>$id]);

    }

    /**
        @description 修改密码
        @author 李硕
        @version 2017/7/11
        @parm $request 输入的密码
        @parm $res 查询数据库返回结果
        @parm $password 通过hash加密后的密码
    */
    //执行修改动作
    Public function updatepass(Request $request){

        //验证密码是否一致
        $this->validate($request,[
            're_password' => 'same:password',
        ],[
            're_password.same' => '两次密码不一致，请重新输入',
        ]);

        //获取用户id
        $id = $request->input('id');

        //获取用户密码
        $data = $request->input('password');

        //密码加密
        $password = \Hash::make($data);

        //修改数据
        $res = \DB::table('user')->where('id',$id)->update(['password'=>$password]);

        //判断
        if($res){

            //重定向
            return redirect('/home/login/index')->with(['info'=>'恭喜您：修改成功']);

        }else{

            return redirect('/home/info')->with(['info'=>'抱歉：修改失败']);
        }
    }
}
