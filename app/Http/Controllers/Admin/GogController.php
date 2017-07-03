<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GogController extends Controller
{
    //加载评论管理首页
    public function index(Request $request){
    	
    	//获取页码数 默认为10
    	$num = $request->input('num',10);

    	//获取搜索关键字 默认为空
    	 $keywords = $request->input('keywords','');

    	//查询表中所有数据
    	$data = \DB::table('gog')->where('name','like','%'.$keywords.'%')->paginate($num);

    	//定义一个属性状态值对应的数组
    	$arr = ['0'=>'正常','1'=>'禁言'];

    	//引入展示页面并发送数据过去进行展示迭代
    	return view('admin.gog.index',['title'=>'评论管理','data'=>$data,'arr'=>$arr,'request'=>$request->all()]);
    }

    //加载添加用户页面
    public function add(){

    	return view('admin.gog.add',['title'=>'添加禁言用户']);
    }

    //执行添加禁言用户
    public function insert(Request $request){

    	$this->validate($request, [
    		'name' => 'required',
    		'starttime' => 'required',
    		'endtime' => 'required'
    		],[
    		'name.required' => '禁言用户名不能为空',
    		'starttime.required' => '开始禁言时间不能为空',
    		'endtime.required' => '结束时间不能为空',
    		]);

    	//获取用户发送过来的数据
    	$data = $request->except('_token');

    	//获取用户名
    	$name = $data['name'];

    	$data['status'] = 1;
 
    	//根据用户名查询数据库
    	$res = \DB::table('user')->where('username',$name)->first();

    	//判断该用户是否存在
    	if(!$res){
    		return back()->with(['info'=>'该用户不存在']);
    	}

    	$pop = \DB::table('gog')->where('name',$name)->first();
   
    	if($pop->status==1){
    		return back()->with(['info'=>'该用户已经被禁言']);
    	}

    	//添加用户添加的时间，用户名等数据到数据库
    	$num = \DB::table('gog')->insert(
    			$data
    		);
    	
    	//判断是否添加成功
    	if(!$num){
    		return back()->with(['info'=>'添加失败']);
    	}else{
    		return redirect('/admin/gog')->with(['info'=>'添加成功']);
    	}
    }

    //用户解禁路由
    public function out($id){

    	//将用户在数据库中的状态值改为正常
    	$res = \DB::table('gog')->where('id',$id)->update(['status'=>0]);

    	if($res){
    		return back()->with(['info'=>'解禁成功']);
    	}else{
    		return back()->with(['info'=>'解禁失败']);
    	}
    }
    
}
