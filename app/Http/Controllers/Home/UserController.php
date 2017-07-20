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

        //查询user表中的数据
        $user = \DB::table('user')->where('id',$data->id)->first();

        // 查询收藏商品条数
        $favorite = \DB::table('favorite')->count();

        // 查询待支付的订单
        $nums_user = \DB::table('nums_user')->count();

    	return view('home.user.index',['res'=>$res, 'user'=>$user,'favorite' => $favorite, 'nums_user' => $nums_user]);
    }
}
