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
		          
		$res = \DB::table('auction')->where('status', 0)->get();

		$obj = \DB::table('shop')->count();

    	return view('home.list.index',['title' => '商品列表', 'data'=> $data, 'res' => $res, 'obj' => $obj]);

    }

    //搜索价格
	public function show(Request $request){

		$bk = $request['b_k'];

		$bq = $request['b_q'];

        $keywords = $request->input('keywords', '');   

		// 多表关联查询
		$data = \DB::table('shop')
		            ->join('user', 'shop.uid', '=', 'user.id')
		            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
		            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
		            ->wherebetween('shop.newpage',[$bk, $bq])
		            ->where('name', 'like', '%'.$keywords.'%')
		            ->get();

        $res = \DB::table('auction')->where('status', 0)->get();

		$obj = \DB::table('shop')->count();

    	return view('home.list.show',['title' => '商品列表', 'data'=> $data, 'res' => $res, 'obj' => $obj]);

	}

    //添加到session
    public function create($id){

    	// 多表关联查询
		$data = \DB::table('shop')
		            ->join('user', 'shop.uid', '=', 'user.id')
		            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
		            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
		            ->where('shop.id', '=', $id)
		            ->first();

		if(session('userlist')){

			//获取session中的商品
			$rr = session()->get('userlist');

			//遍历出有没有重复数据
			foreach ($rr as $key => $value) {
				
				//如果有重复数据返回
				if($value->id == $data->id){

					return "<script>alert('请勿重复添加');location.href='/home/list/index'</script>";
					die();
				}

			}

		}

		//往session中添加物品
    	session()->push('userlist', $data);

    	//赋值便于判断
    	$res = session('userlist');

    	//判断是否成功
    	if($res){

    		return "<script>alert('添加购物车成功');location.href='/home/list/index'</script>";
    		die();
    	}else{
    		
    		return "<script>alert('添加失败');location.href='/home/list/index'</script>";
    		die();
    	}
    }
}
