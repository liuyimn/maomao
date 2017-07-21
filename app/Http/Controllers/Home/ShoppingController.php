<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoppingController extends Controller
{
    //个人中心购物车页
    public function index()
    {
        // 判断是否是否有用户
        if(!session('user'))
        {
            return redirect('home/login/index')->with(['info' => '请登录']);
        }

    	// 查询数据库是否有数据
    	$res = \DB::table('nums_user')->where('uid', session('user')->id)->first();

    	// 判断
    	if ($res) 
    	{
    		// 如果有数据把所有数据查询出来
    		$data = \DB::table('nums_user')
            ->join('shop', 'nums_user.sid', '=', 'shop.id')
            ->where('nums_user.uid', session('user')->id)
            ->select('nums_user.*', 'shop.name', 'shop.newpage', 'shop.connect', 'shop.pic')
            ->simplePaginate(3);
            
            // 查询总条数
            $max = \DB::table('nums_user')->where('uid', session('user')->id)->count();
            // 进一取整
            $max = ceil($max/3);
            
            // 发送数据到页面
            return view('home.shopping.index', ['data' => $data, 'max' => $max]);
            
    	}else
    	{
            // 查询分页
            $data = \DB::table('nums_user')->where('uid', session('user')->id)->simplePaginate(3);
            // 查询总条数
            $max = \DB::table('nums_user')->where('uid', session('user')->id)->count();
            // 进一取整
            $max = ceil($max/3);
    		// 如果没有数据跳到页面不发送值
    		return view('home.shopping.index', ['data' => $data, 'max' => $max]);
    	}
    }

}
