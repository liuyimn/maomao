<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
    *   @return    加载用户列表页
    *   @param     $request 发送过来的结果集
    */
	// index用户列表
    public function index(Request $request){

    	// 分页搜索所需的参数
    	$num = $request->input('num', 10);

        $keywords = $request->input('keywords', '');

        // 查询数据库
        $data = \DB::table('user')->where('username', 'like', '%'.$keywords.'%')->where('auth', 1)->paginate($num);
 		
        $arr = [1 => '普通用户'];
        $sta = [0 => '开启', 1 => '关闭'];

 		// 将数据发送到页面
        return view('admin.user.index', ['request' => $request->all(), 'title' => '用户列表','data' => $data, 'arr' => $arr, 'sta' => $sta]);
    }

    /**
    *   @return    加载管理员页面
    */
    // manage 管理员列表
    public function manage(){
    	// 查询数据库
        $data = \DB::table('user')->where('auth', '>=', 2)->get();

        $arr = [2 => '管理员', 3 => '超级管理员'];
        $sta = [0 => '开启', 1 => '关闭'];

        // 将数据发送发到页面
        return view('admin.user.manage', ['data' => $data, 'title' => '管理员列表', 'arr' => $arr, 'sta' => $sta]);
    }

    /**
    *   @return    加载用户添加页面
    */
    // 添加页面
    public function add(){

    	// 引入页面
    	return view('admin.user.add', ['title' => '用户添加']);
    }

    /**
    *   @return    重定向返回结果
    *   @param     $request 发送过来的结果集
    */
    // 添加执行页
    public function insert(Request $request){
    	$this->validate($request, [
            'username' => 'required|unique:user|min:6|max:18',
            'email' => 'email|unique:user',
            'password' => 'required|min:6|max:18',
            're_password' => 'required|same:password',
            'phone' => 'required|min:11|max:11'
        ],[
            'username.required' => '用户名不能为空',
            'username.unique' => '用户名已经存在',
            'username.min' => '用户名最小 6 个字符',
            'username.max' => '用户名不能超过 18 个字符',
            'email.email' => '请输入正确的邮箱',
            'email.unique' => '邮箱已经存在',
            'password.required' => '密码不能为空',
            'password.min' => '密码最小 6 个字符',
            'password.max' => '密码不能超过 18 个字符',
            're_password.same' => '确认密码不一致',
            're_password.required' => '确认密码不能为空',
            'phone.required' => '电话不能为空',
            'phone.min' => '电话号码必须11位',
            'phone.max' => '电话号码必须11位',
        ]);

        // 过滤字符
        $data = $request->except('_token','re_password');

        // 正则不能有特殊符号
        $red = preg_match_all("/^[a-zA-Z0-9]+$/",$data['username']);

        // 判断用户名
        if(!$red)
        {
            return back()->with(['info' => '用户名不能有特殊符号']);
        }

        // 正则手机号码
        $reg = '/^0?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/';

        // 验证手机是否正确
        $reb = preg_match_all($reg, $data['phone']);

        // 判断
        if(!$reb) 
        {
            return back()->with(['info' => '请输入正确的手机号']);
        }

        // 处理密码加密
        $data['password'] = \Hash::make($data['password']);

        // 处理token
        $data['remember_token'] = str_random(50);
        // 处理时间
        $data['lastlogin'] = time();

        // 执行添加
        $res = \DB::table('user')->insertGetId($data);
        if($res){
        	// 给用户详情表添加数据
        	$uid = \DB::table('userdetail')->insert(['uid' => $res]);

	        if($uid){
	        	// 如果成功跳到主页
	            return redirect('/admin/user/index')->with(['info' => '添加成功']);
	        }else{
	        	// 如果失败返回
	        	return back()->with(['info' => '添加失败']);
	        }

        }else{
	        	return back()->with(['info' => '添加失败']);
        }

    }

    /**
    *    @return    加载用户修改ye
    *    @param     $id 发送过来的id
    */
    // 用户编辑页面
    public function edit($id){
    	// 查询数据库
        $data = \DB::table('user')->where('id', $id)->first();
        // 把数据发送到页面
        return view('admin.user.edit', ['title' => '用户编辑', 'data' => $data]);
    }

    /**
    *    @return    重定向返回结果
    *    @param     $request 发送过来的结果集
    */
    // 执行修改页面
    public function update(Request $request){
    	// 过滤字段 
    	$data = $request->except('_token', 'id');

    	// 修改
    	$res = \DB::table('user')->where('id', $request->id)->update($data);

    	// 判断
    	if($res){
            return redirect('/admin/user/index')->with(['info' => '更新成功']);
    	}else{
    		return back()->with(['info' => '更新失败']);
    	}

    }

    /**
    *    @return    重定向返回结果
    *    @param     $id 发送过来要修改的id
    *    @param     $status 状态
    */
    // 修改权限
    public function upstatus($id, $status){

        // 判断用户不能修改自己状态
        if($id == session('user')->id)
        {
            return back()->with(['info' => '对不起不能修改自己状态']);
        }

        // 判断
        if($status == 1){

            // 修改stutus等于1的 
            $res = \DB::table('user')->where('id', $id)->update(['status' => 0]);
            
        }else if($status == 0){
            // 修改状态
            $res = \DB::table('user')->where('id', $id)->update(['status' => 1]);
        
        }

        // 判断是否修改成功 
        if ($res) {
            return back()->with(['info' => '状态修改成功']);
        }else{
            return back()->with(['info' => '状态修改失败']);
        }

    }

    /**
    *    @return   重定向返回结果
    *    @param    $id int
    */
    // 执行删除
    public function delete($id){
        
        // 判断
        if($id == session('user')->id){
            return back()->with(['info' => '对不起你不能删除自己']);
        }

        //  查询权限
        $data = \DB::table('user')->where('id', $id)->first();

        // 判断是否大于等于2
        if($data->auth >= 2)
        {
            return back()->with(['info' => '对不起你没有权限删除']);
        }

        // 删除用户详情表中的的信息
    	\DB::table('userdetail')->where('uid', $id)->delete();

       	// 执行删除
        $res = \DB::table('user')->where('id', $id)->delete();

        // 判断是否执行成功
        if($res){
        	return back()->with(['info' => '删除成功']);
        }else{
        	return back()->with(['info' => '删除失败']);
        }
    }


}
