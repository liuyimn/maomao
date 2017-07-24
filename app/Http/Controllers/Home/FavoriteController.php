<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    //收藏商品页面
    public function index()
    {
        // 判断用户是否登录
    	if (!session('user')) {
    		return redirect('home/login/index')->with(['info' => '请登录']);
    	}
    	// 查询数据
    	$res = \DB::table('favorite')->where('uid', session('user')->id)->first();

    	if ($res) {
    		// 查询数据
    		$data = \DB::table('favorite')->where('uid', session('user')->id)->simplePaginate(3);
            // 查询总条数
            $max = \DB::table('favorite')->where('uid', session('user')->id)->count();
            // 进一取整
            $max = ceil($max/3);

    		// 遍历获取到的数据
	    	foreach ($data as $key => $value) 
	    	{
	    		// 去数据库查询数据
	    		$datc = \DB::table('shop')->where('id', $value->sid)->get();
	    		// 把数据存放到空数组里
	    		$date[] = $datc;
	    	}

            // 把数据发送到
            return view('home/favorite/favorite', ['date' => $date, 'data' => $data, 'max' => $max]);

    	}else{

            // 引入页面
    		return view('home/favorite/favorite');
    	}

    	

    	
    }

    public function getajax(Request $request)
    {
        // 判断是否登录
        if (!session('user')) 
        {
            return redirect()->with(['info' => '请登录']);
        }
    	// 取出商品id
    	$sid = $request->input('sid');
        
    	// 取出用户id
    	$data['uid'] = session('user')->id;

    	// 取出商品id
    	$data['sid'] = $sid;

    	// 去数据库查询
    	$res = \DB::table('favorite')->where('sid', $sid)->first();
    	
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
        // 判断用户是否登录
        if(!session('user')) 
        {
            return redirect()->with(['info' => '请登录']);
        }
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


}
