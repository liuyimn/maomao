<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyshopController extends Controller
{
    //index
    public function index(){

    	//获取用户id
    	$id = session('user')->id;

    	//查找数据库
    	$res = \DB::table('shop')->where('uid',$id)->simplePaginate(3);

    	//查找总数据条数
    	$max = \DB::table('shop')->where('uid',$id)->count();

    	//进一取整
    	$max = ceil($max/3);
    	
    	//加载视图
    	return view('home.myshop.index',['res'=>$res, 'max'=>$max]);
    }
}
