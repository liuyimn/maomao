<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NumController extends Controller
{

    //订单页面
    public function index(){

    	return view('home.num.index');
    }


    //订单下单
    public function myding(){

        //判断是否存在用户
        if(isset(session('user')->id)){

            //获取当前用户的id
            $uid = session('user')->id;

            //关联查询当前用户的地址信息
            $data = \DB::table('address_list')
                ->where('address_list.uid', '=', $uid)
                ->select('address_list.name', 'address_list.phone', 'address_list.address')
                ->get();

            //获取session中商品信息
            $res = session()->get('userlist');

        }else{

            return redirect('/home/login/index')->with(['info' => '请登录']);            

        }

    	return view('home.num.my', ['title' => '订单详情', 'data' => $data, 'res' => $res]);

    }


    //订单添加
    public function insert(Request $request){

        //判断是否存在用户
        if(isset(session('user')->id)){

            //去除无效字段
            $req = $request->except('_token');

            //定义空字符串
            $str = '';

            //把地址放到字符串中
            $str = $req['address'];

            //当前用户id
            $uid = session('user')->id;

            //商品id
            $data = session()->get('userlist');

            //设置空数组
            $arr = [];

            //遍历出每个商品id
            foreach ($data as $key => $value) {

                //把每个商品id存到数组中
                $arr[] = $value->id;

            }  

            //生成随机订单号
            $order = date('ymdHis').substr(microtime(),2,2);

            //将商品id进行横杠拼接
            $sid = implode($arr,'-');

            //组成数组
            $stmt = [

                'uid' => $uid,
                'num' => $order,
                'sid' => $sid,
                'address' => $str
            ];

            //执行下单操作
            $res = \DB::table('nums_list')->insert($stmt);

            //下单是否成功
            if($res){

                return redirect()->with();

            }else{

                return back();
            }

        }else{

            return redirect('/home/login/index')->with(['info' => '请登录']);   
        }
    }
}
