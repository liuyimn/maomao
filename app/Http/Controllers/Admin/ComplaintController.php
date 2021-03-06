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

        //查询数据
        $data = \DB::table('complaint')
                    ->join('userdetail', 'userdetail.uid', '=', 'complaint.uid')
                    ->select('complaint.*', 'userdetail.nickname')
                    ->where('complaint.content', 'like', '%'.$keywords.'%')
                    ->paginate($num);

        $obj = count($data);

        // 进一取整
        $max = ceil($obj/$num);

    	//将数据发送到页面
    	return view('admin.complaint.index', ['title' => '投诉列表', 'request' => $request->all(), 'data' => $data, 'max' => $max]);

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
