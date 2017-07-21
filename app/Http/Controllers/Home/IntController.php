<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntController extends Controller
{
    //积分页面
    public function index()
    {
    	return view('home.int.index');
    }



}
