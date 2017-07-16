<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(){

        //调用定位城市接口
        $file_contents = file_get_contents('https://api.map.baidu.com/location/ip?ak=KMiDLdbwDqRBLsftnATxq71Zr4DkM1g9&coor=gcj02');

        //Unicode转换成数据码
        $name = json_decode($file_contents);

        //获取城市数据
        $value = $name->content->address;

        //存入session
        session(['city'=>$value]);

        //查询数据 苹果
        $apple = \DB::table('shop')->where('tid',63)->limit(8)->get();

        //查询数据安卓
        $an = \DB::table('shop')->where('tid',128)->limit(8)->get();

        //数码分类
        $pho = \DB::table('shop')->orwhere('tid',46)->orwhere('tid',40)->limit(8)->get();
        //获取session
    	if(session('user')){

    		//获取用户数据
    		$res = session('user');

    		//根据用户id查询该用户详情
    		$data = \DB::table('userdetail')->where('uid',$res->id)->first();

    		//存入session
    		session(['userdetail'=>$data]);
    	}

    	//加载模板
    	return view('home.index.index',['city'=>$value,'apple'=>$apple,'an'=>$an,'pho'=>$pho]);
    }

      // 递归查询所有分类
    public function getCategoryByPid($pid)
    {
        $data = \DB::table('type')->where('pid', $pid)->get();

        $allData = [];
        foreach ($data as $key => $val) 
        {
            $val->sub = $this->getCategoryByPid($val->id);
            $allData[] = $val; 
        }
        return $allData;
    }
}
