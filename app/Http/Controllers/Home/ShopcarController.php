<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopcarController extends Controller
{
    //购物车页
    public function index(){

        //获取到session中商品信息
        session()->get('userlist');

        //赋值便于遍历
        $data = session('userlist');

        //查询总共多少个
        $res = count($data);

    	//展示界面
    	return view('home.shopcar.index',['title' => '大脸猫', 'data' => $data, 'res' => $res]);

    }

    //删除
    public function delete($key, Request $request){

        //进行商品删除
        $request->session()->forget('userlist.'.$key);
        
        return "<script>alert('已删除商品');location.href='/home/details/shopcar'</script>";
        die();
        
    }
}
