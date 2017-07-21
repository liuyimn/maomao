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
		$user = \DB::table('userdetail')
					->join('shop', 'userdetail.uid', '=', 'shop.uid')
					->where('userdetail.uid', $res->id)
					->first();

		//测试
		$jx = \DB::table('shop')->where('tid', 193)->limit(5)->get();
		
		//三元运算判断是否存在用户
		$uid = isset(session('user')->id)?session('user')->id:'';

		// 收藏状态
		$sta = \DB::table('favorite')->where('sid', $data->id)->where('uid', $uid)->first();

		//获取所有该商品的评论
		$com = \DB::table('commit')->where('sid',$id)
				->join('userdetail', 'commit.uid', '=', 'userdetail.uid')
	            ->select('commit.*', 'userdetail.photo', 'userdetail.nickname')
	            ->simplePaginate(3);

	    $max = \DB::table('commit')
				->join('userdetail', 'commit.uid', '=', 'userdetail.uid')
	            ->select('commit.*', 'userdetail.photo', 'userdetail.nickname')
	            ->count();

	    //进一取整
    	$max = ceil($max/3);

		return view('home.details.index',['title' => '商品详情', 'data' => $data, 'res' => $res, 'user' => $user, 'jx' => $jx, 'sta' => $sta, 'com'=>$com, 'max'=>$max]);

	}

}
