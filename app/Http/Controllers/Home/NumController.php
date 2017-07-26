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
    public function myding(Request $request){

        //判断是否存在用户
        if(isset(session('user')->id)){

            //获取当前用户的id
            $uid = session('user')->id;

            //关联查询当前用户的地址信息
            $data = \DB::table('address_list')
                ->where('address_list.uid', '=', $uid)
                ->select('address_list.name', 'address_list.phone', 'address_list.address')
                ->get();

            //获取订单表商品信息
            $res = \DB::table('nums_user')->where('uid', $uid)->where('status', 1)->get();

            //判断当前对象不为空
            if(!$res->isEmpty()){
            
                //遍历到所有商品详细信息
                foreach ($res as $key => $value) {

                    //多表关联查询
                    $k = \DB::table('shop')
                        ->join('user', 'shop.uid', '=', 'user.id')
                        ->join('userdetail', 'user.id', '=', 'userdetail.uid')
                        ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
                        ->where('shop.id', '=', $value->sid)
                        ->first();

                        $r[] = $k;

                }
                
                return view('home.num.my', ['title' => '订单详情', 'data' => $data, 'r' => $r]);

            }else{

                //提示买家选商品
                return back()->with(['info' => '请选择商品']);
            }

        }else{

            return redirect('/home/login/index')->with(['info' => '请登录']);            

        }
    }

    //拍卖订单下单
    public function auct($id, Request $request){

        //判断是否存在用户
        if(isset(session('user')->id)){

            //获取当前用户的id
            $uid = session('user')->id;

            //关联查询当前用户的地址信息
            $data = \DB::table('address_list')
                ->where('address_list.uid', '=', $uid)
                ->select('address_list.name', 'address_list.phone', 'address_list.address')
                ->get();

            //获取订单表商品信息
            $res = \DB::table('auction')->where('id', $id)->get();

            //判断当前对象不为空
            if(!$res->isEmpty()){
            
                //遍历到所有商品详细信息
                foreach ($res as $key => $value) {

                    //判断当前用户是否是商品用户
                    if($value->uid == $uid){
                        return "<script>alert('怎么可以买自己的东西~');location.href='".$_SERVER['HTTP_REFERER']."'</script>"; 
                    }

                    //多表关联查询
                    $k = \DB::table('auction')
                        ->join('user', 'auction.uid', '=', 'user.id')
                        ->join('userdetail', 'user.id', '=', 'userdetail.uid')
                        ->select('auction.*', 'userdetail.nickname', 'userdetail.photo')
                        ->where('auction.id', '=', $value->id)
                        ->first();

                        $r[] = $k;

                }
                
                return view('home.num.index', ['title' => '订单详情', 'data' => $data, 'r' => $r]);

            }else{

                //提示买家选商品
                return back();
            }

        }else{

            return redirect('/home/login/index')->with(['info' => '请登录']);            

        }

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

            //价钱
            $page = $req['cosprice'];

            //当前用户id
            $uid = session('user')->id;

            //商品id
            $data = \DB::table('nums_user')->where('uid', $uid)->get();

            //设置空数组
            $arr = [];

            //遍历出每个商品id
            foreach ($data as $key => $value) {
                
                //遍历获取商品id
                $id = $value->sid;

                //设置状态数组
                $ar = ['status' => 1]; 
                
                //修改商品状态
                $res = \DB::table('shop')->where('id', $id)->update($ar);

                //把每个商品id存到数组中
                $arr[] = $value->sid;

            }  

            //生成随机订单号
            $order = date('ymdHis').substr(microtime(),2,2);

            //将商品id进行拼接
            $sid = implode($arr, '-');

            //创造订单时间
            $date = date('Y-m-d H:i:s');

            //组成数组
            $stmt = [

                'uid' => $uid,
                'num' => $order,
                'time' => $date,
                'sid' => $sid,
                'page' => $page,
                'address' => $str
            ];

            //执行下单操作
            $res = \DB::table('nums_list')->insert($stmt);

            //下单是否成功
            if($res){

                //获取当前用户的信息
                $nums = \DB::table('userdetail')->where('uid', $uid)->first();

                //用户积分生成
                $newp = $page * 0.1;

                //将积分相加
                $newpage = $newp + $nums->num;

                //生成积分数组
                $array = [
                    'num' => $newpage
                ];

                //去更新用户积分
                \DB::table('userdetail')->where('uid', $uid)->update($array);

                //删除关于当前用户的商品
                \DB::table('nums_user')->where('uid', $uid)->delete();

                return view('home.shopcar.active', ['stmt' => $stmt, 'newp' => $newp]);

            }else{

                return back();
            }

        }else{

            return redirect('/home/login/index')->with(['info' => '请登录']);   
        }
    }

    //拍卖订单添加
    public function inserts(Request $request){

        //判断是否存在用户
        if(isset(session('user')->id)){

            //去除无效字段
            $req = $request->except('_token');

            //定义空字符串
            $str = '';

            //把地址放到字符串中
            $str = $req['address'];

            //价钱
            $page = $req['cosprice'];

            //商品id
            $sid = $req['id'];

            //当前用户id
            $uid = session('user')->id;

            //生成随机订单号
            $order = date('ymdHis').substr(microtime(),2,2);

            //创造订单时间
            $date = date('Y-m-d H:i:s');

            //组成数组
            $stmt = [

                'uid' => $uid,
                'num' => $order,
                'time' => $date,
                'sid' => $sid,
                'page' => $page,
                'address' => $str,
                'auth' => 1
            ];

            //执行下单操作
            $res = \DB::table('nums_list')->insert($stmt);

            //下单是否成功
            if($res){

                //获取当前用户的信息
                $nums = \DB::table('userdetail')->where('uid', $uid)->first();

                //用户积分生成
                $newp = $page * 0.1;

                //将积分相加
                $newpage = $newp + $nums->num;

                //生成积分数组
                $array = [
                    'num' => $newpage
                ];

                //生成状态数组
                $sta = ['status' => 1];

                //去更新用户积分
                \DB::table('userdetail')->where('uid', $uid)->update($array);

                //删除关于当前用户的商品
                \DB::table('nums_user')->where('uid', $uid)->delete();

                //修改当前拍卖商品的状态
                \DB::table('auction')->where('id', $sid)->update($sta);

                return view('/home/shopcar/active', ['stmt' => $stmt, 'newp' => $newp]);
 
            }else{

                return back();
            }

        }else{

            return redirect('/home/login/index')->with(['info' => '请登录']);   
        }
    }


    //成功下订单页面
    public function active(Request $request){

        //查询数据库
        $range = \DB::table('config')->first()

        return view('home.shopcar.active', ['range' => $range]);

    }


    //商品选中ajax事件
    public function dajax(Request $request){

        //获取到传值来的商品id
        $sid = $request->input('sid');

        //获取当前用户id
        $id = session('user')->id;

        //去查询当前商品详细信息
        $data = \DB::table('nums_user')->where('uid', $id)->where('sid', $sid)->first();

        //如果商品状态为0
        if($data->status == 0){

            //改变商品状态为1
            $data->status = 1;

            //定义空数组
            $r = [];

            //构造状态
            $r = ['status' => $data->status];

            //修改商品状态为1
            \DB::table('nums_user')->where('uid', $id)->where('sid', $sid)->update($r);

        //如果商品状态为1
        }else if($data->status == 1){

            //改变商品状态为0
            $data->status = 0;

            //定义空数组
            $r = [];

            //构造状态
            $r = ['status' => $data->status];

            //修改商品状态为0
            \DB::table('nums_user')->where('uid', $id)->where('sid', $sid)->update($r);
        }
    }

    //全选或全不选ajax事件
    public function allajax(Request $request){

        //获取到所有传值的商品id
        $sid = $request->input('sid');

        //获取当前用户id
        $id = session('user')->id;

        //查询每个商品信息
        $data = \DB::table('nums_user')->where('uid', $id)->where('sid', $sid)->first();

        //如果商品状态为0
        if($data->status == 0){

            //改变商品状态为1
            $data->status = 1;

            //定义空数组
            $r = [];

            //构造状态
            $r = ['status' => $data->status];

            //修改商品状态为1
            \DB::table('nums_user')->where('uid', $id)->where('sid', $sid)->update($r);

        //如果商品状态为1
        }else if($data->status == 1){

            //改变商品状态为0
            $data->status = 0;

            //定义空数组
            $r = [];

            //构造状态
            $r = ['status' => $data->status];

            //修改商品状态为0
            \DB::table('nums_user')->where('uid', $id)->where('sid', $sid)->update($r);
        }

    }

}