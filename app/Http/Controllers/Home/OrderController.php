<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //个人订单页面
    public function index()
    {
        // 判断用户是否登录
        if(!session('user'))
        {
            return redirect('home/login/index')->with(['info' => '请登录']);
        }
        // 查询用户登录
        $res = \DB::table('nums_list')->where('uid', session('user')->id)->where('auth', 0)->first();

        if($res)
        {
            // 查询所有
            $data = \DB::table('nums_list')
            ->join('shop', 'nums_list.sid', '=', 'shop.id')
            ->where('nums_list.uid', '=', session('user')->id)
            ->where('auth', 0)
            ->select('nums_list.*', 'shop.name')
            ->simplePaginate(3);

            $max = \DB::table('nums_list')->where('uid', session('user')->id)->count();

            // 状态按钮
            $arr = ['0' => '未支付', '1' => '支付'];

            // 把数据发送到页面 
            return view('home/order/index', ['data' => $data, 'arr' => $arr, 'max' => $max]);
        }else
        {
            return view('home/order/index');
        }

    }
}
