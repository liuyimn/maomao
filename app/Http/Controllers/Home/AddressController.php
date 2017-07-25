<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    // 收货地址页
    public function index()
    {
        // 判断是否有session
        if (!session('user')) {
            return redirect('home/login/index');
        }
    	// 把查到的数据发送到页面
    	$data = \DB::table('address_list')->where('uid', session('user')->id)->get();

    	// 返回页面
    	return view('home.address.index', ['data' => $data]);
    }

    // 添加页面
    public function add()
    {
        // 判断是否有session
        if(!session('user')){
            return redirect('home/login/index');
        }

        // 查询收货地址条数
        $res = \DB::table('address_list')->where('uid', session('user')->id)->count();

        // 判断收货地址条数是否大于5条
        if($res >= 5){
            return back()->with(['info' => '收货地址只可以添加5条']);
        }

    	// 返回页面
    	return view('home.address.add');
    }

    // 执行添加
    public function insert(Request $request)
    {
        // 判断是否有session
        if(!session('user')){
            
            return redirect('home/login/index');
        }	
    	// 表单验证
    	$this->validate($request, [
            'name' => 'required',
            'addressa' => 'required',
            'addressb' => 'required',
            'user_adress' => 'required',
            'phone' => 'required|min:11|max:11',
        ],[
            'name.required' => '姓名不能为空',
            'addressa.required' => '地址不能为空',
            'addressb.required' => '地址不详细',
            'user_adress.required' => '详细地址不能为空',
            'phone.required' => '手机号不能为空',
            'phone.min' => '手机号码不正确',
            'phone.max' => '手机号码不正确',
        ]);

        // 过滤字符
        $data = $request->except('_token', 'addressa', 'addressb', 'addressc', 'user_adress');

        // 正则手机号码
        $reg = '/^0?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/';

        // 验证手机是否正确
        $red = preg_match_all($reg, $data['phone']);

        // 判断
        if(!$red) 
        {
            return back()->with(['info' => '请输入正确的手机号']);
        }
        // 拼接字符
        if($request['addressc'] != '0') {
        	$data['address'] = $request['addressa'].$request['addressb'].$request['addressc'].$request['user_adress'];
        }else{
        	$data['address'] = $request['addressa'].$request['addressb'].$request['user_adress'];
        }

        // 添加用户id
        $data['uid'] = session('user')->id;

        // 把数据添加到数据库
        $res = \DB::table('address_list')->insert($data);

        // 判断是否成功
        if($res)
        {
        	return redirect('home/address/index')->with(['info' => '添加成功']);
        }else{
        	return back()->with(['info' => '添加失败']);
        }
        
    }

    // 修改页面
    public function edit($id)
    {
        // 判断是否有session
        if(!session('user')){
            return redirect('home/login/index');
        }
    	// 查询数据库
    	$data = \DB::table('address_list')->where('uid', session('user')->id)->where('id', $id)->first();

    	// 把数据发送到页面
    	return view('home.address.edit', ['data' => $data]);
    }

    // 执行修改
    public function update(Request $request)
    {
        // 表单验证
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required|min:5',
            'phone' => 'required|min:11|max:11',
        ],[
            'name.required' => '姓名不能为空',
            'address.required' => '地址不能为空',
            'address.min' => '详细地址不能少于5个字符',
            'phone.required' => '手机号不能为空',
            'phone.min' => '手机号码不正确',
            'phone.max' => '手机号码不正确',
        ]);
        // 判断是否有session
        if (!session('user')) {
            return back();
        }
    	// 过滤
    	$data = $request->except('_token', 'id');

        // 正则手机号码
        $reg = '/^0?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/';

        // 验证手机是否正确
        $red = preg_match_all($reg, $data['phone']);

        // 判断
        if(!$red) 
        {
            return back()->with(['info' => '请输入正确的手机号']);
        }

    	// 添加到数据库
    	$res = \DB::table('address_list')->where('id', $request->id)->update($data);

    	// 判断是否添加成功
    	if($res){
    		return redirect('home/address/index')->with(['inof' => '添加成功']);
    	}else{
    		return back()->with(['info' => '添加失败']);
    	}
    }

    // 执行删除
    public function delete($id)
    {
        if(!session('user')){
            return back();
        }
    	// 去数据库删除
    	$res = \DB::table('address_list')->where('uid', session('user')->id)->delete($id);

    	// 判断
    	if($res)
    	{
    		return back()->with(['info' => '删除成功']);
    	}else{
    		return back()->with(['info' => '删除失败']);
    	}
    }

}
