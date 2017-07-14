<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //index
    public function index(){

    	//判断是否退出
    	if(!session('user')){

    		//重定向
    		return redirect('/');
    	}
    	
    	//获取session中的数据
    	$data = session('user');

    	//根据当前用户的id查询该用户的详情信息
    	$res = \DB::table('userdetail')->where('uid',$data->id)->first();
    	
    	return view('home.user.index',['res'=>$res]);
    }
}
