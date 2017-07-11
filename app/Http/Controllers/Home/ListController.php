<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    //商品页
    public function index(Request $request){

    	
    	//默认关键字为空
        $keywords = $request->input('keywords', '');   

    	// 多表关联查询
		$data = \DB::table('shop')
		            ->join('user', 'shop.uid', '=', 'user.id')
		            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
		            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
		            ->where('name', 'like', '%'.$keywords.'%')
		            ->get();
		          
		$res = \DB::table('auction')->get();


    	return view('home.list.index',['title' => '商品列表', 'data'=> $data, 'res' => $res]);

    }
}
