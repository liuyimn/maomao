<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageController extends Controller
{
    //
    //展示所有区域代理主页
    public function index(Request $request){

    	//加载视图
    	return view('admin.manage.index',['title'=>'市场管理主页']);
    }

    public function add(){

    	//加载视图
    	return view('admin.manage.add',['title'=>'市场管理添加']);
    }

    public function url(){
    	return view('admin/city/cityData.min.json');
    }
}
