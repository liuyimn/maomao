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
    

    //引入推荐页
    public function tuijian(){

        //加载视图
        return view('home.tuijian.index');
    }

    public function fuwu(){

        //加载视图
        return view('home.fuwu.index');
    }

    public function next(){

        //数码分类
        $one = \DB::table('type')->where('pid',1)->get();

        //孕婴
        $two = \DB::table('type')->where('pid',2)->get();

        //服饰
        $three = \DB::table('type')->where('pid',5)->get();

        //美容
        $four = \DB::table('type')->where('pid',130)->get();

        //家具日用
        $fif = \DB::table('type')->where('pid',3)->get();

        //家电
        $six = \DB::table('type')->where('pid',4)->get();

        //运动爱好
        $seven = \DB::table('type')->where('pid',149)->get();

        //汽车用品
        $eight = \DB::table('type')->where('pid',158)->get();

        // 送礼专区
        $nine = \DB::table('type')->where('pid', 166)->get();

        //数码分类
        $num = \DB::table('type')->where('pid',10)->orwhere('pid',12)->limit(10)->get();
       
        //手机数码
        $phone = \DB::table('shop')->where('tid',46)->orwhere('tid',49)->orwhere('tid',129)->limit(10)->get();

        //孕婴
        $baby = \DB::table('type')->where('pid',13)->orwhere('pid',14)->orwhere('pid',15)->limit(10)->get();

        //婴儿用品
        $bby = \DB::table('shop')->where('tid',85)->orwhere('tid',97)->orwhere('tid',98)->orwhere('tid',99)->limit(10)->get();
        
        //服饰鞋包
        $shut = \DB::table('type')->where('pid',5)->orwhere('pid',6)->limit(9)->get();

        //女装配饰
        $shirt = \DB::table('shop')->where('tid',177)->orwhere('tid',180)->limit(10)->get();

        //美容护肤分类
        $but = \DB::table('type')->where('pid',130)->get();

        //美妆
        $ful = \DB::table('shop')->where('tid',183)->orwhere('tid',184)->orwhere('tid',185)->orwhere('tid',186)->orwhere('tid',187)->limit(10)->get();

        //家具日用
        $bbc = \DB::table('type')->where('pid',3)->get();

        // 家具
        $fur = \DB::table('shop')->where('tid', 108)->get();

        // 生活服务
        $fuw = \DB::table('shop')->where('tid', 206)->orwhere('tid', 207)->orwhere('tid', 208)->limit(10)->get();

        //加载视图
        return view('home.next.index',['one'=>$one,'two'=>$two,'three'=>$three,'four'=>$four,'fif'=>$fif,'six'=>$six,'seven'=>$seven,'eight'=>$eight, 'nine' => $nine,'num'=>$num,'phone'=>$phone,'baby'=>$baby,'bby'=>$bby,'shut'=>$shut,'shirt'=>$shirt,'but'=>$but,'ful'=>$ful,'bbc'=>$bbc, 'fur' => $fur, 'fuw' => $fuw]);

    }
}
