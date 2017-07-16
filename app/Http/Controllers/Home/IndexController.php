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

        //手机分类
        $ss = \DB::table('shop')->where('tid',129)->limit(8)->get();
        
        //笔记本电脑分类
        $com = \DB::table('shop')->where('tid',46)->limit(8)->get();

        //单反分类
        $photo = \DB::table('shop')->where('tid',42)->limit(8)->get();

        //手机分类
        $phone = \DB::table('shop')->where('tid',129)->limit(8)->get();

        //价格小于3000的拍卖商品
        $small = \DB::table('auction')->where('newpage','<=',3000)->limit(6)->get();

        //拍卖商品
        $auction = \DB::table('auction')->limit(6)->get();

        //备用放心 
        $two = \DB::table('shop')->where('tid',47)->limit(8)->get();

        //老人放心
        $three = \DB::table('shop')->where('tid',64)->limit(8)->get();
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
    	return view('home.index.index',['city'=>$value,'apple'=>$apple,'an'=>$an,'pho'=>$pho,'ss'=>$ss,'com'=>$com,'photo'=>$photo,'phone'=>$phone,'auction'=>$auction,'small'=>$small,'two'=>$two,'three'=>$three]);
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
