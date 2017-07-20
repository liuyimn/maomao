<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MygoodsController extends Controller
{
    // 个人中心我的商品首页
    public function index()
    {
    	if (!session('user')) 
    	{
    		return redirect('home/login/index');
    	}
    	// // 判断是否购买商品
    	$data = \DB::table('nums_list')->where('uid', session('user')->id)->where('auth', 0)->get();
    	
    	if($data)
    	{
    		// 定义两个空数组
    		$k = [];
    		$w = [];

    		// 第一层遍历数组放到$k中
    		foreach($data as $val)
    		{	
    			// 把遍历出来的id存放到空数组
    			$k[] = explode('-', $val->sid);
    		}
    		
    		// 遍历二维数组
			foreach($k as $key)
    		{
    			foreach($key as $a)
    			{
    				// 把遍历出来的商品id去数据库查询
    				$res = \DB::table('shop')->where('id', $a)->get();
    				// 把查询到的数据放到空数组中
    				$w[] = $res;
    			}
    		}

    		// 把数据发送到页面 
    		return view('home/mygoods/index', ['w' => $w]);
    	}else{
    		// 如果没有数据直接引入页面
    		return view('home/mygoods/index');
    	}
    }

    // 我卖出的
    public function mysold()
    {
    	if (!session('user')) 
    	{
    		return redirect('home/login/index');
    	}

    	// 查询数据库
    	$data = \DB::table('shop')->where('uid', session('user')->id)->where('status', 1)->get();

    	// 把数据发送到页面
       	return view('home/mygoods/mysold', ['data' => $data]);
    }
}
