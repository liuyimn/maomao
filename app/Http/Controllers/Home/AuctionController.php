<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

date_default_timezone_get('PRC');

class AuctionController extends Controller
{
    //拍卖页面
    public function index(Request $request){

        //默认关键字为空
        $keywords = $request->input('keywords', '');

    	//多表关联查询
		$data = \DB::table('auction')
		            ->join('user', 'auction.uid', '=', 'user.id')
		            ->join('userdetail', 'user.id', '=', 'userdetail.uid') 
                    ->where('auction.status','=','0')
                    ->where('auction.name', 'like', '%'.$keywords.'%')
		            ->select('auction.*', 'userdetail.nickname', 'userdetail.photo')
                    ->get();

		//遍历出数据值;
		foreach ($data as $key => $value) {
			
            $w = $value->starttime;

            time($value->endtime);
            $endtime = $w + 

			//时间戳更换为年月日
			$value->starttime = date("Y-m-d H:i:s",$value->starttime);

			//按空格拆分
			$time = explode(' ',$value->starttime); 

			//制造当前时间戳
			$ntime = date("Y-m-d");

			//定义一个状态数组
			$da = ['status' => '1'];

			//如果当前商品日期不等于当前日期
			if($time[0] != $ntime){

				//修改当前商品状态为已过期
				$res = \DB::table('auction')->where('id', $value->id)->update($da);

			}
		}

		//测试
		$res = \DB::table('shop')->where('tid', 2)->get();


    	return view('home.auct.index', ['title' => '商品拍卖', 'data' => $data, 'res' => $res]);

    }


    public function create($id){

    	//给session定义个数组(测试)
    	session(['id' => 1]);

    	//查询到当前放入购物车的商品信息
    	$res = \DB::table('shop')->where('id', $id)->first();

    	//将当前登录人和商品信息存入session
    	session([
    		'sid' => $res->id,		//商品id
    		'uid' => $res->uid, 	//商家id	
    		'did' => session('id') //登录人id
    		]);

    	dd(session());
 

        //判断session数组中是否存在过该添加购物车的商品  
        if (array_key_exists($GET_name, $shop_cart)) {  
            
            //该商品已经添加过购物车，进行shop_cart数组中的该商品数量加1的操作  
            $shop_cart[$GET_name]['goods_num'] ++;  
       
        } else {  
           
            //该商品为新商品，进行数据库查询该商品具体信息，并存入shop_cart数组  
            $goods = D('goods');  
            $result = $goods->where(array('goods_id' => array('eq', $GET_id)))->select();  
  
            $arr0 = array($GET_name => array('goods_id' => $GET_id, 'goods_num' => 1, 'goods_name' => $GET_name, 'goods_price' => $result[0]['goods_price']));  
  
            foreach ($arr0 as $key => $value) {  
                $shop_cart[$key] = $value;  
            }  
        }  
  
        session('shop_cart', $shop_cart);  //赋值给session  
        //var_dump($shop_cart);  
        $this->assign('shop_cart', $shop_cart);  
        $this->display();  

    }
}