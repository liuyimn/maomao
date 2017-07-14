<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddshopController extends Controller
{
    //index  展示
    public function index(){

    	//判断是否登录
    	if(!session('user')){

    		//重定向
    		return redirect('/home/login/index');
    	}

    	//查询顶级父类分类
    	$res = \DB::table('type')->where('pid',0)->get();
   	
   		//引入页面发送数据
    	return view('home.addshop.add',['res'=>$res]);
    }

    //ajaxjone
    public function ajaxone(Request $request){
    	
    	//获取传递过来的pid
    	$id = $request['pid'];
    	
    	//根据pid查询数据
    	$res = \DB::table('type')->where('pid',$id)->get();

    	//转换成json并发送
   		echo json_encode($res);

    }

    //ajaxtwo
    public function ajaxtwo(Request $request){

    	//获取传递过来的id
    	$id = $request['pid'];

    	//根据id查询数据
    	$res = \DB::table('type')->where('pid',$id)->get();

    	//数据转换json并发送
    	echo json_encode($res);
    }

    public function insert(Request $request){

    	//获取用户id
    	$id = session('user')->id;
    	
    	//获取传递过来的数据
    	$data = $request->except('_token','province','city','area');

    	//获取省市数据
    	$address = $request->only('province','city','area');
   
    	//处理省市
    	$data['address'] = implode(',', $address);

    	//添加时间
    	$data['ctime'] = time();

    	//压入数组
		$data['uid'] = $id;

    	//判断图片是否合法
    	if($request->hasFile('pic')){

    		if($request->file('pic')->isValid()){

    			//获取图片扩展名
    			$extension = $request->file('pic')->extension();

    			//生成图片名称
    			$filename = time().mt_rand(000000,999999).'.'.$extension;

    			//移动
    			$request->file('pic')->move('./uploads/shop',$filename);

    			$data['pic'] = $filename;

    		}
    	}

    	//添加数据库
    	$res = \DB::table('shop')->insert($data);

    	//判断
    	if($res){
    		return redirect('home/addshop/index');
    	}else{
    		return back();
    	}
    }
}
