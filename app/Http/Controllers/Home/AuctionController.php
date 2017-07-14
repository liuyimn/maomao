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
}

