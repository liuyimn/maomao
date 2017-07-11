<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplaintController extends Controller
{
    //投诉列表
    public function index(Request $request){

    	//定义默认显示10条
    	$num = $request->input('num', 10);

    	//定义默认关键字为空
        $keywords = $request->input('keywords', ''); 

        //设置缓存时间
        $minutes = 20;

        //启用缓存系统
        $data = \Cache::remember('complaint', $minutes, function(){

            //查询数据
            return \DB::table('complaint')->get();

        });

    	//调用数据库中的模糊查询
    	$data = \DB::table('complaint')->where('content', 'like', '%'.$keywords.'%')->paginate($num);

    	//将数据发送到页面
    	return view('admin.complaint.index', ['title' => '投诉列表', 'data' => $data]);

    }

    //投诉信息删除
    public function delete($id){
    	
    	//删除当前传递的投诉信息
    	$res = \DB::table('complaint')->where('id', $id)->delete();

    	//判断是否成功
    	if($res){

            \Cache::forget('complaint');

    		//删除成功跳转列表页
    		return redirect('/admin/cpt')->with(['info' => '删除成功']);

    	}else{

    		//删除失败跳转回当前页面
    		return back()->with(['info' => '删除失败']);

    	}

    }

}
