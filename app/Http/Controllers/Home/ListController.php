<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    //商品页
    public function index(Request $request){

    	//定义分页
    	$num = '8';

    	//默认关键字为空
        $keywords = $request->input('keywords', '');   

    	// 多表关联查询
		$data = \DB::table('shop')
		            ->join('user', 'shop.uid', '=', 'user.id')
		            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
		            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
		            ->where('shop.status', '=', '0')
		            ->where('name', 'like', '%'.$keywords.'%')
		            ->paginate($num);

		//遍历拍卖商品状态为0的
		$res = \DB::table('auction')->where('status', 0)->limit(5)->get();

		//查询总条数
		$obj = \DB::table('shop')->count();

    	return view('home.list.index',['title' => '商品列表', 'data'=> $data, 'request' => $request->all(), 'res' => $res, 'obj' => $obj]);

    }

    //搜索价格
	public function show(Request $request){

		//定义分页
    	$num = '8';

		//起始价格
		$bk = $request['b_k'];

		//最终价格
		$bq = $request['b_q'];

		//定义搜索关键词
        $keywords = $request->input('keywords', '');   

		// 多表关联查询
		$data = \DB::table('shop')
		            ->join('user', 'shop.uid', '=', 'user.id')
		            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
		            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
		            ->wherebetween('shop.newpage',[$bk, $bq])
		            ->where('name', 'like', '%'.$keywords.'%')
		            ->paginate($num);

		//遍历拍卖商品状态为0的
        $res = \DB::table('auction')->where('status', 0)->get();

        //查询商品总条数
		$obj = \DB::table('shop')->count();

    	return view('home.list.show',['title' => '商品列表', 'data'=> $data, 'res' => $res, 'request' => $request->all(), 'obj' => $obj]);

	}

    //添加到session
    public function create($id){

    	//判断是否有用户存在
    	if(session('user')){

    		$r = \DB::table('nums_user')->where('sid', $id)->first();

    		if($r){

    			return "<script>alert('请勿重复添加');location.href='".$_SERVER['HTTP_REFERER']."'</script>"; 

    		}else{

    			//定义空数组
	    		$data = [];

	    		//存放用户存在时添加购物车的操作
	    		$data = [

	    			'uid' => session('user')->id,
	    			'sid' => $id
	    		];

	    		//添加表数据
	    		$res = \DB::table('nums_user')->insert($data);

	    		//判断是否成功
		    	if($res){

		    		return "<script>alert('添加购物车成功');location.href='/home/details/shopcar'</script>";
		    		die();
		    	}else{
		    		
		    		return "<script>alert('添加失败');location.href='".$_SERVER['HTTP_REFERER']."'</script>";
		    		die();
		    	}

    		}


    	}else{

	    	//多表关联查询
			$data = \DB::table('shop')
			            ->join('user', 'shop.uid', '=', 'user.id')
			            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
			            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
			            ->where('shop.id', '=', $id)
			            ->first();

			//判断session中是否有商品
			if(session('userlist')){

				//获取session中的商品
				$rr = session()->get('userlist');

				//遍历出有没有重复数据
				foreach ($rr as $key => $value) {
					
					//如果有重复数据返回
					if($value->id == $data->id){

						return "<script>alert('请勿重复添加');location.href='".$_SERVER['HTTP_REFERER']."'</script>";
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

	    		return "<script>alert('添加购物车成功');location.href='".$_SERVER['HTTP_REFERER']."'</script>";
	    		die();
	    	}else{
	    		
	    		return "<script>alert('添加失败');location.href='".$_SERVER['HTTP_REFERER']."'</script>";
	    		die();
	    	}
	    }

	}

}
