<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TalkController extends Controller
{
    //引入页面
    public function index($sid,$mid){

    	//判断
    	if(!session('user')){
    		return redirect('/home/login/index');
    	}

    	//判断
    	//获取当前登陆用户id
    	$uid = session('user')->id;

    	if($uid == $mid){
    		return back()->with(['info'=>'非法操作']);
    	}

    	//引入模板
    	return view('home.talk.talk',['mid'=>$mid,'sid'=>$sid]);
    }

    //send
    public function send(Request $request){

    	//获取卖家id 商品id 内容等数据
    	$data = $request->except('_token');

    	//获取当前用户id
    	$data['uid'] = session('user')->id;
    	
    	//添加到数据库
    	$res = \DB::table('talking')->insert($data);

    	//判断
    	if($res){
    		return redirect('home/details/'.$data['sid'])->with(['info'=>'发送成功']);
    	}
    }
}
