<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //个人订单页面
    public function index()
    {
    	// 
    	$data = \DB::table('nums_list')->where('uid', session('user')->id)->where('auth', 0)->get();

    	if($data)
    	{
    		// 定义两个空数组
    		$k = [];
    		$w = [];

    		// 第一层遍历数组放到$k中
    		foreach($data as $val)
    		{
    			$k[] = explode('-', $val->sid);
    		}


    		// 遍历二维数组
			foreach($k as $key)
    		{
    			// 查询商品数量
				$sid = count($key);
    			foreach($key as $a)
    			{
    				// 把遍历出来的商品id去数据库查询
    				$res = \DB::table('shop')->where('id', $a)->get();
    				// 把查询到的数据放到空数组中
    				$w[] = $res;
    			}
    		}
    		// 状态按钮
    		$arr = ['0' => '未支付', '1' => '支付'];

    		// 把数据发送到页面 
    		return view('home/order/index', ['w' => $w, 'data' => $data, 'arr' => $arr]);
    	}else
    	{
    		return view('home/order/index');
    	}

    }
}
