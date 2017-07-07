<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistController extends Controller
{
    // 登录页面
	public function index()
	{
		return view('home.regist.index');
	}

	// ajax 
	public function registajax(Request $request)
	{
		// 取出数据
		$phone = $request->phone;
		$username = $request->name;

		// dd($phone);
		// 匹配手机号正则
		$reg = '/^0?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/';
		if (preg_match_all($reg, $phone)) 
		{
            // 查询数据库
			$res = \DB::table('user')->where('phone', $phone)->first();
			
			if ($res) 
			{
				return response()->json('1');
			}else{
				return response()->json('2');
			}

		}else{
			return response()->json('0');
		}

		$rez = '/^[a-zA-Z0-9]{5,16}$/';
		if (preg_match_all($rez, $username))
		{
			// 查询数据库
			$res = \DB::table('user')->where('username', $username)->first();

			if ($res) 
			{
				return response()->json('1');	
			}else{
				return response()->json('2');
			}

		}else{
			return response()->json('0');
		}

			
		
	}
}
