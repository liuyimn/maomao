<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommitController extends Controller
{
    //执行添加评论
    public function add(Request $request){

    	//获取用户输入的数据
    	$data = $request->except('_token');

    	//生成评论时间
    	$data['ptime'] = time();

    	//添加数据库
    	$res = \DB::table('commit')->insert($data);

    	//判断
    	if($res){
    		return back()->with(['info'=>'恭喜：成功评论']);
    	}else{
    		return back()->with(['info'=>'抱歉：评论失败']);
    	}
    }
}
