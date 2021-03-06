<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NumController extends Controller
{
    //展示积分页面
    public function index(Request $request){

    	//定义默认显示10条
    	$num = $request->input('num', 10);

    	//定义默认关键字为空
        $keywords = $request->input('keywords', ''); 

        //设置缓存时间
        $minutes = 20;

        //启用缓存系统
        $data = \Cache::remember('userdetail', $minutes, function(){

            //查询userdetail表中所有数据
            return \DB::table('userdetail')->get();
            
        });

    	//调用数据库中的模糊查询
    	$data = \DB::table('userdetail')->where('nickname', 'like', '%'.$keywords.'%')->paginate($num);


        $obj = count($data);

        // 进一取整
        $max = ceil($obj/$num);
        

    	return view('admin.num.index', ['title' => '用户积分',  'request' => $request->all(), 'data' => $data, 'max' => $max]);

    }

    //修改信息
    public function update($id){
    	
    	//查询当前数据
    	$data = \DB::table('userdetail')->where('id', $id)->first();

    	//设定一个数组等于0
    	$arr['num_status'] = 0;

    	//判断当前数据积分状态
    	if($data->num_status == 0){

    		$arr['num_status'] = 1;

    	}else if($data->num_status == 1){

    		$arr['num_status'] = 0;

    	}

    	//将修改过的数组更新到数据库中
    	$res = \DB::table('userdetail')->where('id', $id)->update($arr);

    	//判断是否成功
    	if($res){

            //删除该数据缓存
            \Cache::forget('userdetail');

    		return redirect('/admin/nums/index')->with(['info' => '已修改']);

    	}else{

    		return back()->with(['info' => '修改失败']);
    	}
    }

    //冻结详细积分
    public function edit(Request $request){

        //去除_token无效字段
        $res = $request->except('_token');

        //将传递过来积分进行赋值
        $num_p = $res['num_p'];

        //根据传递的用户id查找数据
        $data = \DB::table('userdetail')->where('id', $res['id'])->first();

        //判断积分是否能减成功
        if($num_p > $data->num){

            return back()->with(['info' => '积分不够冻结的']);
            
        }else{

            //将用户中积分减去传递的积分
            $jian = $data->num - $num_p;

            //将减完的积分放到用户数据里面
            $data->num = $jian;

            //将用户中冻结积分加上传递的积分
            $jia = $data->num_p + $num_p;

            //将减完积分放到数组中
            $da = ['num' => $jian];

            //将加完积分放到数组中
            $dat = ['num_p' => $jia];

            //执行根据用户id进行更新积分
            $data = \DB::table('userdetail')->where('id', $res['id'])->update($da);

            //执行根据用户id进行更新冻结积分
            $data = \DB::table('userdetail')->where('id', $res['id'])->update($dat);

            //判断是否成功
            if ($data) {

                \Cache::forget('userdetail');

                return redirect('/admin/nums/index')->with(['info' => '冻结成功']);

            }else{

                return back()->with(['info'=>'冻结失败']);
            }
        }
    }
}
