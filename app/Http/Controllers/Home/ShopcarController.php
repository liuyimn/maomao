<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopcarController extends Controller
{
    //购物车页
    public function index(){

        //判断是否有当前用户
        if(session('user')){

            //判断session是否有商品存在
            if(session('userlist')){

                //获取当前用户id
                $id = session('user')->id;

                //获取session中商品信息
                $stmt = session()->get('userlist');

                //组成数组必须的用户信息
                $sid['uid'] = $id;

                //进行遍历
                foreach ($stmt as $key => $value) {
                    
                    //组成数组必须的每个商品id
                    $sid['sid'] = $value->id; 

                    //遍历添加数据
                    \DB::table('nums_user')->where('uid', $id)->insert($sid);

                    //遗忘session中的商品信息
                    session()->forget('userlist');
                }

                //查询是否有该用户的商品
                $data = \DB::table('nums_user')->where('uid', $id)->first();

                //判断
                if($data){

                    //获取当前用户的所有商品
                    $data = \DB::table('nums_user')->where('uid', $id)->get();
                    
                    //进行遍历商品
                    foreach($data as $key => $value){

                        //多表关联查询
                        $k = \DB::table('shop')
                            ->join('user', 'shop.uid', '=', 'user.id')
                            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
                            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
                            ->where('shop.id', '=', $value->sid)
                            ->first();

                            $ka[] = $k;
                     }

                    //查询到条数
                    $res = count($data);

                    //展示界面
                    return view('home.shopcar.index',['title' => '大脸猫', 'ka' => $ka, 'res' => $res]);

                }else{

                    //展示界面
                    return view('home.shopcar.index',['title' => '大脸猫']);
                }

            }else{

                //获取当前用户id
                $id = session('user')->id;

                //获取到关于当前用户的所有商品
                $data = \DB::table('nums_user')->where('uid', $id)->first();

                //判断
                if($data){

                    //获取当前用户的商品信息
                    $data = \DB::table('nums_user')->where('uid', $id)->get();
                    
                    //进行遍历商品
                    foreach($data as $key => $value){

                        //多表关联查询
                        $k = \DB::table('shop')
                            ->join('user', 'shop.uid', '=', 'user.id')
                            ->join('userdetail', 'user.id', '=', 'userdetail.uid')
                            ->select('shop.*', 'userdetail.nickname', 'userdetail.photo')
                            ->where('shop.id', '=', $value->sid)
                            ->first();

                            $ka[] = $k;
                     }

                    //查询到条数
                    $res = count($data);

                    //展示界面
                    return view('home.shopcar.index',['title' => '大脸猫', 'ka' => $ka, 'res' => $res]);

                }else{

                    //展示界面
                    return view('home.shopcar.index',['title' => '大脸猫']);
                }
                
            }
            
        }else{

            //获取到session中商品信息
            session()->get('userlist');

            //赋值便于遍历
            $data = session('userlist');

            //查询总共多少个
            $res = count($data);

        	//展示界面
        	return view('home.shopcar.index',['title' => '大脸猫', 'data' => $data, 'res' => $res]);
        }
    }

    //删除
    public function delete($key, Request $request){

        //获取下标
        // $key = $request->input('key');

        //判断是否存在用户
        if(session('user')){

            //存在删除表中数据
            $res = \DB::table('nums_user')->where('sid', $key)->delete();

            //判断
            if($res)
            {
                return "<script>alert('已删除商品');location.href='/home/details/shopcar'</script>";
            }else{
                return "<script>alert('删除失败');location.href='/home/details/shopcar'</script>";
            }

        }else{

            //进行商品删除
            $request->session()->forget('userlist.'.$key);

            // return response()->json('0');
             
           return "<script>alert('已删除商品');location.href='/home/details/shopcar'</script>";
            
        }
    }
}
