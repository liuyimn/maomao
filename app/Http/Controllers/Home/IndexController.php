<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(){

    	//获取session
    	if(session('user')){
    		$res = session('user');
    		$data = \DB::table('userdetail')->where('uid',$res->id)->first();
    		session(['userdetail'=>$data]);
    	}


    	return view('home.index.index',['title' => '   ']);
    }
}
