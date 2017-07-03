<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertController extends Controller
{
    //加载广告页面主页
	public function index(){
		return view('admin.advert.index');
	}	

	//加载用户添加页面
	public function add(){

		//引入页面
		return view('admin.advert.add',['title'=>'添加广告']);
	}
}
