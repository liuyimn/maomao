<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    //商品购买表
	public function index($id){

		//商品信息查询
		$data = \DB::table('shop')->where('id', $id)->first();
		
		//判断浏览次数
		if($data->num < 99999999){

			//让浏览次数每次自增一
			$data->num ++;
		}

		//定义num字段数组
		$da = ['num' => $data->num];

		//更新数据中的num字段
		$a = \DB::table('shop')->where('id', $id)->update($da);
		
		//查询卖家信息
		$res = \DB::table('user')->where('id', $data->uid)->first();
		
		//查询卖家的详细信息
		$user = \DB::table('userdetail')->where('id', $res->id)->first();

		//测试
		$jx = \DB::table('shop')->get();
		// dd($jx);
		$uid = isset(session('user')->id)?session('user')->id:'';
		// 收藏状态
		$sta = \DB::table('favorite')->where('sid', $data->id)->where('uid', $uid)->first();

		return view('home.details.index',['title' => '商品详情', 'data' => $data, 'res' => $res, 'user' => $user, 'jx' => $jx, 'sta' => $sta]);

	}

}
