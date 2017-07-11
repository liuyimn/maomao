<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
    @description 使用数据库操作实现对区域管理的增删改查
    @antu  李硕
    @version 2017-7-7
*/
class ManageController extends Controller
{
    /**
        @parm $num 分页条数  默认每页10条
        @parm $keywords 关键字 根据代理人关键字进行搜索
        @parm $data 处理后的数据 发送到前台进行编辑
        @return 将需要的数据统统转送进前台 
    */
    //展示所有区域代理主页
    public function index(Request $request){
        //定义默认显示10条
        $num = $request->input('num', 10);

        //定义默认关键字为空
        $keywords = $request->input('keywords', '');

        //查询数据库
        $data = \DB::table('manage')->where('uname', 'like', '%'.$keywords.'%')->paginate($num);

    	//加载视图
    	return view('admin.manage.index',['title'=>'市场管理主页','data'=>$data,'request'=>$request->all()]);
    }

    /**
        @return 加载视图
    */
    //展示代理人添加页面
    public function add(){

    	//加载视图
    	return view('admin.manage.add',['title'=>'市场管理添加']);
    }

    /**
        @parm $data 提交过来的数据
        @parm $res  插入数据库后返回的结果
    */
   //执行添加区域管理动作
    public function insert(Request $request){

        //获取提交过来的数据
        $data = $request->except('_token');
        // dd($data);
        $this->validate($request,[
                'uname' => 'required|unique:manage,uname',
                'city' => 'unique:manage,city',
            ],[
                'uname.required' => '代理人不能为空',
                'uname.unique' => '代理人不能重复',
                'city.unique' => '该区域已有代理',
            ]); 

        //添加数据库
        $res = \DB::table('manage')->insert(   
                $data
            );

        //判断添加是否成功
        if($res){

            //成功跳转定向到展示页
            return redirect('/admin/manage/index')->with(['info'=>'添加代理成功']);
        }else{

            //失败返回
            return back()->with(['info'=>'添加代理失败，请检查']);
        }
     }
}
