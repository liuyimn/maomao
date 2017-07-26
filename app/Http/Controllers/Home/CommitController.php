<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommitController extends Controller
{
    //执行添加评论
    public function add(Request $request){

        // 判断是否有session
        if(!session('user')){
            return redirect('home/login/index');
        }


        //获取用户名
        $name = session('user')->username;

        //根据用户名查看是否被禁言
        $sta = \DB::table('gog')->where('name',$name)->first();
      
        if($sta->status == 1){
            return back()->with(['info'=>'您已经被禁言请联系管理员解禁']);
        }

    	//获取用户输入的数据
    	$data = $request->except('_token');

    	//生成评论时间
    	$data['ptime'] = time();

    	//添加数据库
    	$res = \DB::table('commit')->insert($data);

    	//判断
    	if($res){
    		return back()->with(['info'=>'恭喜：成功评论']);
    	}else{
    		return back()->with(['info'=>'抱歉：评论失败']);
    	}
    }


    // 个人中心
    public function index()
    {
        // 判断是否有session
        if(!session('user')){
            return redirect('home/login/index');
        }
        
        // 获取去用户id
        $uid = session('user')->id;

        // 查询是否有数据
        $res = \DB::table('commit')->where('uid', $uid)->first();
        
        // 判断是否存在
        if ($res) 
        {
            // 查询所有的评论
             $data = \DB::table('commit')
                    ->join('shop', 'shop.id', '=', 'commit.sid')
                    ->where('commit.uid', $uid)
                    ->select('commit.*', 'shop.name', 'shop.pic')
                    ->simplePaginate(3);

            // 查询总条数
            $max = \DB::table('commit')->where('uid', session('user')->id)->count();
            // 进一取整
            $max = ceil($max/3);
            
             // 引入页面
            return view('home/comment/index', ['data' => $data, 'max' => $max]);

        }else{
            // 如果没有数据引入空的页面
            return view('home/comment/index');
        }

       
    }
}
