<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MygoodsController extends Controller
{
    // 个人中心我的商品首页
    public function index()
    {
    	// 判断用户是否登录
    	if (!session('user')) 
    	{
    		return redirect('home/login/index');
    	}
    	// // 判断是否购买商品
    	$res = \DB::table('nums_list')->where('uid', session('user')->id)->where('auth', 0)->first();
    	
    	if($res)
    	{
    		$data = \DB::table('nums_list')->where('uid', session('user')->id)->where('auth', 0)->get();

    		// 定义两个空数组
    		$k = [];
    		$w = [];

    		// 第一层遍历数组放到$k中
    		foreach($data as $val)
    		{	
    			// 把遍历出来的id存放到空数组
    			$k = explode('-', $val->sid);
            
                foreach($k as $a)
                {
                    // 把遍历出来的商品id去数据库查询
                    $res = \DB::table('shop')->where('id', $a)->first();

                    // 把查询到的数据放到空数组中
                    $w[] = $res;

                }
    		}

            // 把数据发送到页面 
    		return view('home/mygoods/index', ['w' => $w]);

    	}else{
    		
    		// 如果没有数据直接引入页面
    		return view('home/mygoods/index', ['data' => $data, 'max' => $max]);
    	}
    }

    // 我卖出的
    public function mysold()
    {
    	// 判断是否登录
    	if (!session('user')) 
    	{
    		return redirect('home/login/index');
    	}

    	// 查询数据库
    	$data = \DB::table('shop')->where('uid', session('user')->id)->where('status', 1)->first();
    	
    	// 判断是否有数据
    	if($data)
    	{
    		// 查询分页
    		$data = \DB::table('shop')->where('uid', session('user')->id)->where('status', 1)->simplePaginate(3);

    		// 查询总条数
    		$max = \DB::table('shop')->where('uid', session('user')->id)->count();
            // 进一取整
            $max = ceil($max/3);

    		// 把数据发送到页面
       		return view('home/mygoods/mysold', ['data' => $data, 'max' => $max]);

    	}else{

    		// 把数据发送到页面
       		return view('home/mygoods/mysold');

    	}
    	
    }
}
