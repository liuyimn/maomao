<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    //收藏商品页面
    public function index()
    {
    	if (!session('user')) {
    		return redirect('home/login/index');
    	}
    	// 查询数据
    	$data = \DB::table('favorite')->where('uid', session('user')->id)->first();

    	if ($data) {
    		// 查询数据
    		$data = \DB::table('favorite')->where('uid', session('user')->id)->get();

    		// 遍历获取到的数据
	    	foreach ($data as $key => $value) 
	    	{
	    		// 去数据库查询数据
	    		$data = \DB::table('shop')->where('id', $value->sid)->get();
	    		// 把数据存放到空数组里
	    		$date[] = $data;
	    	}
    	}else{
    		return view('home.favorite.favorite');
    	}

    	

    	return view('home.favorite.favorite', ['date' => $date]);
    }

    public function getajax(Request $request)
    {
    	// 取出商品id
    	$sid = $request->input('sid');
    	// 取出用户id
    	$data['uid'] = session('user')->id;
    	// 取出商品id
    	$data['sid'] = $sid;
    	// 去数据库查询
    	$res = \DB::table('favorite')->where('sid', $sid)->first();
    	// dd($res);
    	// 判断是否能查到结果
    	if($res)
    	{
    		// 如果存在删除
    		$res = \DB::table('favorite')->where('uid', session('user')->id)->where('sid',$sid)->delete();
    		//1代表取消收藏
    		return response()->json('1');

    	}else{
    		// 如果不存在添加
    		$res = \DB::table('favorite')->insert($data);

    		//0代表收藏
    		return response()->json('0');
    	}


    }


    // 删除收藏商品
    public function delete($id)
    {
    	// 删除收藏商品
    	$res = \DB::table('favorite')->where('uid', session('user')->id)->where('sid', $id)->delete();

    	// 判断是否删除成功
    	if ($res) 
    	{
    		return redirect('home/favorite/index');
    	}else{
    		return back();
    	}
    }

    public function email(Request $request){
        dd($request->all());
    }

}
