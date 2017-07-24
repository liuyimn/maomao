<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntController extends Controller
{
    //积分页面
    public function index()
    {

    	// 查询个人积分
    	$num = \DB::table('userdetail')->where('uid', session('user')->id)->first()->num;
    	
    	$data = \DB::table('nums_list')->where('uid', session('user')->id)->first();

    	if($data) 
    	{
    		// 查询订单表
	    	$data = \DB::table('nums_list')->where('uid', session('user')->id)->simplePaginate(3);

	    	//查找总数据条数
	    	$max = \DB::table('nums_list')->where('uid', session('user')->id)->count();

	    	//进一取整
	    	$max = ceil($max/3);

	    	// dd($data);
	    	return view('home/int/index', ['num' => $num, 'data' => $data, 'max' => $max]);
    	}else{

    		return view('home/int/index', ['num' => $num]);
    	}

    }



}
