<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoppingController extends Controller
{
    //个人中心购物车页
    public function index()
    {
    	// 查询数据库是否有数据
    	$res = \DB::table('nums_user')->where('uid', session('user')->id)->first();

    	// 判断
    	if ($res) 
    	{
    		// 如果有数据把所有数据查询出来
    		$data = \DB::table('nums_user')->where('uid', session('user')->id)->get();
    		// 声明空数组
    		$date = [];

    		// 遍历数据
    		foreach ($data as $key) 
    		{
    			// 按遍历出来的商品id去获取商品
    			$data = \DB::table('shop')->where('id', $key->sid)->get();

    			// 把商品放到空数组
    			$date[] = $data;
    		}
            
    	}else
    	{
    		// 如果没有数据跳到页面不发送值
    		return view('home.shopping.index');
    	}
        // 发送数据到页面
        return view('home.shopping.index', ['date' => $date]);
    }

}
