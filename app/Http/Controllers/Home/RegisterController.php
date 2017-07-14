<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //引入注册页面方法
    public function register(){
    	return view('home.register.register');
    }

    /**
    	@description ajax验证手机号
    	@auth 李硕
    	@version 2017/7/10
    	@parm $phone ajax传递过来的参数
    	@parm $reg 正则规则
    	@parm $res 校验正则是否合法
    	@parm $data 查询数据库的返回值
    	@return 1：手机号不合法，请重新输入 
    	@return 2: 该手机已经注册
    	@return 3: 该手机号可以使用
 	*/
    //验证手机是否存在方法
    public function pajax(Request $request){

    	//获取输入的手机号
    	$phone = $request['phone'];

    	//手机号正则
		$reg = '/^0?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/';

		//正则匹配验证是否合法
		$res = preg_match_all($reg,$phone);

		//判断是否合法
		if($res){

			//查询数据库中的电话号码是否存在
			$data = \DB::table('user')->where('phone',$phone)->first();

		}else{
			//输入的手机号不合法，请重新输入
			return response()->json('1');
		}

		//进行判断
		if($data){
			//该手机已经注册
			return response()->json('2');
		}else{
			//该手机号可以使用
			return response()->json('3');
		}

    }

    public function name(Request $request){

    	//获取ajax传递过来的参数
    	$username = $request->name;

    	//根据传递过来的用户名查询数据库
    	$res = \DB::table('user')->where('username',$username)->first();

    	//判断
    	if($res){

    		//该用户已经存在
    		return response()->json('1');
    	}else{

    		//该用户名可以使用
    		return response()->json('2');
    	}
    }

    //添加用户的方法
    public function insert(Request $request){

    	//获取传递过来的数据
    	$data = $request->except('_token');

        //生成token
    	$data['remember_token'] = str_random(50);
    	
        //使用hash加密密码
    	$data['password'] = \Hash::make($data['password']);
    	//添加数据到user表并返回添加的id
    	$res = \DB::table('user')->insertGetId($data);
    	
    	//将id添加到userdetail表
    	$result = \DB::table('userdetail')->insert(['uid'=>$res]);

    	$num = \DB::table('user')->where('id',$res)->first();
    	session(['user'=>$num]);
    	//判断
    	if($res && $result){

    		//存储该用户数据到session
    		session('user',$res);

    		//跳转到主页
    		return redirect('/');
    	}
    }
}
