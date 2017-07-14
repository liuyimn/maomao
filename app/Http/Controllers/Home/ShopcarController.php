<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopcarController extends Controller
{
    //购物车页
    public function index(){

        //多表关联查询
        $data = \DB::table('shop_list')
                    ->join('user', 'shop_list.uid', '=', 'user.id')
                    ->join('shop', 'shop_list.sid', '=', 'shop.id')
                    ->select('shop_list.*', 'shop.newpage', 'shop.name', 'shop.pic')
                    ->get();

    	
    	//展示界面
    	return view('home.shopcar.index',['title' => '大脸猫', 'data' => $data]);

    }

}
