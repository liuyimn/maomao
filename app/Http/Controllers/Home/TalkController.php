<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TalkController extends Controller
{
    //引入页面
    public function index($sid,$mid){

    	//判断
    	if(!session('user')){
    		return redirect('/home/login/index');
    	}

    	//判断
    	//获取当前登陆用户id
    	$uid = session('user')->id;

    	if($uid == $mid){
    		return back()->with(['info'=>'非法操作']);
    	}

    	//引入模板
    	return view('home.talk.talk',['mid'=>$mid,'sid'=>$sid]);
    }

    //send
    public function send(Request $request){

    	//获取卖家id 商品id 内容等数据
    	$data = $request->except('_token');

    	//获取当前用户id
    	$data['uid'] = session('user')->id;
    	
    	//添加到数据库
    	$res = \DB::table('talking')->insert($data);

    	//判断
    	if($res){
    		return redirect('home/details/'.$data['sid'])->with(['info'=>'发送成功']);
    	}
    }

    //list
    public function list(Request $request){

        //判断
        if(session('user')){

            //修改状态
            $res = \DB::table('talking')->where('mid',session('user')->id)->update(['status'=>1]);

        }else{

            return redirect('home/login/index');

        }
        
        //查询
        $data = \DB::table('talking')
                    ->where('talking.mid',session('user')->id)
                    ->join('userdetail','talking.uid','=','userdetail.uid')
                    ->join('shop','talking.sid','=','shop.id')
                    ->select('talking.*','userdetail.nickname','userdetail.photo','shop.pic','shop.name','shop.id')
                    ->simplePaginate(3);

        // dd($data);

        //查出共有多少条信息
         $max = \DB::table('talking')
                    ->where('talking.mid',session('user')->id)
                    ->join('userdetail','talking.uid','=','userdetail.uid')
                    ->join('shop','talking.sid','=','shop.id')
                    ->select('talking.*','userdetail.nickname','shop.pic')
                    ->count();

        //进一取整
        $max = ceil($max/3);

        //查出数据用于判断
        $date = \DB::table('talking')
                    ->where('talking.mid',session('user')->id)
                    ->join('userdetail','talking.uid','=','userdetail.uid')
                    ->join('shop','talking.sid','=','shop.id')
                    ->select('talking.*','userdetail.nickname','shop.pic')
                    ->first();

        //销毁session
        $request->session()->forget('talk');

        //引入页面
        return view('home.talk.list',['data'=>$data,'date'=>$date,'max'=>$max]);
    }

    //引入模型
    public function model($uid,$mid,$sid){
        
        return view('home.talk.model',['uid'=>$uid,'mid'=>$mid,'sid'=>$sid]);
    }

    //talkback 执行
    public function talkback(Request $request){

        //获取所有数据
        $data = $request->except('_token');

        $res = \DB::table('talkback')->insert($data);

        if($res){

            return back()->with(['info'=>'回复成功']);
        }
    }

    public function listing(Request $request){
        //判断
        if(session('user')){
            //修改状态
             $res = \DB::table('talkback')->where('uid',session('user')->id)->update(['status'=>1]);
        }else{

            return redirect('home/login/index');

        }

          //查询
        $data = \DB::table('talkback')
                    ->where('talkback.uid',session('user')->id)
                    ->join('userdetail','talkback.uid','=','userdetail.uid')
                    ->join('shop','talkback.sid','=','shop.id')
                    ->select('talkback.*','userdetail.nickname','userdetail.photo','shop.pic','shop.name','shop.id')
                    ->simplePaginate(3);


        //查出共有多少条信息
         $max = \DB::table('talkback')
                    ->where('talkback.uid',session('user')->id)
                    ->join('userdetail','talkback.uid','=','userdetail.uid')
                    ->join('shop','talkback.sid','=','shop.id')
                    ->select('talkback.*','userdetail.nickname','shop.pic')
                    ->count();

        //进一取整
        $max = ceil($max/3);

        //查出数据用于判断
        $date = \DB::table('talkback')
                    ->where('talkback.uid',session('user')->id)
                    ->join('userdetail','talkback.uid','=','userdetail.uid')
                    ->join('shop','talkback.sid','=','shop.id')
                    ->select('talkback.*','userdetail.nickname','shop.pic')
                    ->first();

        //销毁session
        $request->session()->forget('talkback');

        //引入页面
        return view('home.talk.listing',['data'=>$data,'date'=>$date,'max'=>$max]);
        
    }
}
