<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    //商品页
    public function index(Request $request){

        session()->forget('address');
        session()->forget('page');

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

	   // 进一取整
        $max = ceil($obj/8);

    	return view('home.list.index',['title' => '商品列表', 'data'=> $data, 'request' => $request->all(), 'res' => $res, 'obj' => $obj,'max'=>$max]);

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
        $res = \DB::table('auction')->where('status', 0)->limit(5)->get();

        //查询商品总条数
		$obj = count($data);

    	return view('home.list.show',['title' => '商品列表', 'data'=> $data, 'res' => $res, 'request' => $request->all(), 'obj' => $obj]);

	}

    //添加商品
    public function create($id){

    	//判断是否有用户存在
    	if(session('user')){

    		//判断是否有重复商品
    		$r = \DB::table('nums_user')->where('sid', $id)->first();

    		//获取当前用户信息
    		$uid = session('user')->id;

    		//获取当前商品信息
    		$ar = \DB::table('shop')->where('id', $id)->first();

    		//判断当前用户是否是商品用户
    		if($ar->uid == $uid){

    			return "<script>alert('怎么可以买自己的东西~');location.href='".$_SERVER['HTTP_REFERER']."'</script>"; 
    		}

    		//判断是否有重复商品
    		if($r){

    			return "<script>alert('请勿重复添加');location.href='".$_SERVER['HTTP_REFERER']."'</script>"; 

    		}else{

    			//定义空数组
	    		$data = [];

	    		//存放用户存在时添加购物车的操作
	    		$data = [

	    			'uid' => $uid,
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

	//商品价格搜索ajax
	public function Research(Request $request){

		//获取到传值过来价格
		$pag = $request->input('page');

		//价格存入session
		session(['page' => $pag]);

		//判断session中是否满足
		if(session('address')){

			//判断session中地址
			if(session('address') == '不限'){

				//遗忘session中地址
				session()->forget('address');

				//判断是否等于不限
				if($pag == '不限'){

					//删除session中价格
					session()->forget('page');

					// 多表关联查询
					$data = \DB::table('shop')
					            ->join('user', 'shop.uid', '=', 'user.id')
					            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
					            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
					            ->paginate(8);

					//查询总条数
					$obj = count($data);

				   // 进一取整
			        $max = ceil($obj/3);

			        return view('home.list.research', ['data' => $data,'request' => $request->all(), 'obj' => $obj , 'max'=>$max]);

				}else{

					//获取到session中价格
					$pag = session('page');

					//拆分
					$newpage = explode('-', $pag);

					//赋值起始价格
					$start = $newpage[0];

					//赋值结束价格
					$end = $newpage[1];

					// 多表关联查询
					$data = \DB::table('shop')
					            ->join('user', 'shop.uid', '=', 'user.id')
					            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
					            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
					            ->wherebetween('shop.newpage',[$start, $end])
					            ->paginate(8);

					//查询总条数
					$obj = count($data);

				   // 进一取整
			        $max = ceil($obj/3);

			        return view('home.list.research', ['data' => $data,'request' => $request->all(), 'obj' => $obj , 'max'=>$max]);
				}

			}else{

				//判断是否等于不限
				if($pag == '不限'){

					//删除session中价格
					session()->forget('page');

					//取出session中的地址
					$address = session('address');

					// 多表关联查询
					$data = \DB::table('shop')
					            ->join('user', 'shop.uid', '=', 'user.id')
					            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
					            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
					            ->where('shop.address', 'like', '%'.$address.'%')
					            ->paginate(8);

					//查询总条数
					$obj = count($data);

				   // 进一取整
			        $max = ceil($obj/3);

			        return view('home.list.research', ['data' => $data,'request' => $request->all(), 'obj' => $obj , 'max'=>$max]);

				}else{

					//获取到session中价格
					$pag = session('page');

					//拆分
					$newpage = explode('-', $pag);

					//赋值起始价格
					$start = $newpage[0];

					//赋值结束价格
					$end = $newpage[1];

					//取出session中的地址
					$address = session('address');

					// 多表关联查询
					$data = \DB::table('shop')
					            ->join('user', 'shop.uid', '=', 'user.id')
					            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
					            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
					            ->where('shop.address', 'like', '%'.$address.'%')
					            ->wherebetween('shop.newpage',[$start, $end])
					            ->paginate(8);

					//查询总条数
					$obj = count($data);

				   // 进一取整
			        $max = ceil($obj/3);

			        return view('home.list.research', ['data' => $data,'request' => $request->all(), 'obj' => $obj , 'max'=>$max]);
				}
			}

		}else{

			//判断是否等于不限
			if($pag == '不限'){

				//删除session中价格
				session()->forget('page');

				// 多表关联查询
				$data = \DB::table('shop')
				            ->join('user', 'shop.uid', '=', 'user.id')
				            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
				            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
				            ->paginate(8);

				//查询总条数
				$obj = count($data);

			   // 进一取整
		        $max = ceil($obj/3);

		        return view('home.list.research', ['data' => $data,'request' => $request->all(), 'obj' => $obj , 'max'=>$max]);

			}else{

				//获取到session中价格
				$pag = session('page');

				//拆分
				$newpage = explode('-', $pag);

				//赋值起始价格
				$start = $newpage[0];

				//赋值结束价格
				$end = $newpage[1];

				// 多表关联查询
				$data = \DB::table('shop')
				            ->join('user', 'shop.uid', '=', 'user.id')
				            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
				            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
				            ->wherebetween('shop.newpage',[$start, $end])
				            ->paginate(8);

				//查询总条数
				$obj = count($data);

			   // 进一取整
		        $max = ceil($obj/3);

		        return view('home.list.research', ['data' => $data,'request' => $request->all(), 'obj' => $obj , 'max'=>$max]);
			}
		}	
	}

	//判断地址
	public function Search(Request $request){

		//获取地址
		$address = $request->input('address');

		//赋值session中的地址
		session(['address' => $address]);

		//判断
		if(session('page')){

			if(session('page') == '不限'){

				session()->forget('page');

				//判断
				if($address == '不限'){

					//删除session中的地址
					session()->forget('address');

					//多表关联查询
					$data = \DB::table('shop')
					            ->join('user', 'shop.uid', '=', 'user.id')
					            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
					            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
					            ->paginate(8);

					//查询总条数
					$obj = count($data);

				   // 进一取整
			        $max = ceil($obj/3);

			        return view('home.list.research', ['data' => $data,'request' => $request->all(), 'obj' => $obj , 'max'=>$max]);die();
				
				}else{

					//取出session中的地址
					$address = session('address');
				
					//定义分页
					$num = '8';

					// 多表关联查询
					$data = \DB::table('shop')
					            ->join('user', 'shop.uid', '=', 'user.id')
					            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
					            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
					            ->where('shop.address', 'like', '%'.$address.'%')
					            ->paginate($num);

					//查询总条数
					$obj = count($data);

				   	// 进一取整
			        $max = ceil($obj/3);

			        return view('home.list.research', ['data' => $data,'request' => $request->all(), 'obj' => $obj , 'max'=>$max]);

		        }

			}else{

				//获取session中的价格
				$page = session('page');

				//判断
				if($address == '不限'){

					//删除session中的地址
					session()->forget('address');

					//拆分
					$newpage = explode('-', $page);

					//赋值起始价格
					$start = $newpage[0];

					//赋值结束价格
					$end = $newpage[1];

					//多表关联查询
					$data = \DB::table('shop')
					            ->join('user', 'shop.uid', '=', 'user.id')
					            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
					            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
					            ->wherebetween('shop.newpage',[$start, $end])
					            ->paginate(8);

					//查询总条数
					$obj = count($data);

				   // 进一取整
			        $max = ceil($obj/3);

			        return view('home.list.research', ['data' => $data,'request' => $request->all(), 'obj' => $obj , 'max'=>$max]);die();
				
				}else{

					//拆分
					$newpage = explode('-', $page);

					//赋值起始价格
					$start = $newpage[0];

					//赋值结束价格
					$end = $newpage[1];

					//定义分页
					$num = '8';

					// 多表关联查询
					$data = \DB::table('shop')
					            ->join('user', 'shop.uid', '=', 'user.id')
					            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
					            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
					            ->where('shop.address', 'like', '%'.$address.'%')
					            ->wherebetween('shop.newpage',[$start, $end])
					            ->paginate($num);

					//查询总条数
					$obj = count($data);

				   	// 进一取整
			        $max = ceil($obj/3);

			        return view('home.list.research', ['data' => $data,'request' => $request->all(), 'obj' => $obj , 'max'=>$max]);

		        }
			}
		}else{

			//判断
			if($address == '不限'){

				//删除session中的地址
				session()->forget('address');

				//多表关联查询
				$data = \DB::table('shop')
				            ->join('user', 'shop.uid', '=', 'user.id')
				            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
				            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
				            ->paginate(8);

				//查询总条数
				$obj = count($data);

			   // 进一取整
		        $max = ceil($obj/3);

		        return view('home.list.research', ['data' => $data,'request' => $request->all(), 'obj' => $obj , 'max'=>$max]);die();
			
			}else{
			
				//定义分页
				$num = '8';

				// 多表关联查询
				$data = \DB::table('shop')
				            ->join('user', 'shop.uid', '=', 'user.id')
				            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
				            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
				            ->where('shop.address', 'like', '%'.$address.'%')
				            ->paginate($num);

				//查询总条数
				$obj = count($data);

			   	// 进一取整
		        $max = ceil($obj/3);

		        return view('home.list.research', ['data' => $data,'request' => $request->all(), 'obj' => $obj , 'max'=>$max]);

	        }
		}
	}
}
