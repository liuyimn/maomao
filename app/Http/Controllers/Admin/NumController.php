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

    	//查询userdetail表中所有数据
    	$data = \DB::table('userdetail')->get();

    	//调用数据库中的模糊查询
    	$data = \DB::table('userdetail')->where('nickname', 'like', '%'.$keywords.'%')->paginate($num);


    	return view('admin.num.index', ['title' => '用户积分',  'request' => $request->all(), 'data' => $data]);

    }

    //修改信息
    public function update($id){

    	// dd($request->id);request->

    	//查询当前数据
    	$data = \DB::table('userdetail')->where('id', $id)->first();

    	// dd($data);

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
    		return redirect('/admin/nums/index')->with(['info' => '已修改']);
    	}else{
    		return back()->with(['info' => '修改失败']);
    	}

    }

}
