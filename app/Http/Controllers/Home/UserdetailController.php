<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserdetailController extends Controller
{
    // 个人详情页面
    public function edit()
    {
        // 判断是否有session
    	if (!session('user')) {
    		return redirect('home/login/index');
    	}
    	// 获取用户的id
    	$uid = session('user')->id;

    	// 去数据库查询
    	$data = \DB::table('userdetail')->where('uid', $uid)->first();

        // 拆分年月日
    	$birth = explode('#', $data->birth);

        $data->email = \DB::table('user')->where('id', $uid)->first()->email;

    	// 把查询到数据发送到页面
    	return view('home.userdetail.edit', ['data' => $data, 'birth' => $birth]);
    }

    // 执行修改页面
    public function update(Request $request){

    	// 验证表单
    	$this->validate($request, [
            'nickname' => 'required',
        ],[
        	'nickname.required' => '昵称不能为空',
        ]);

        // 过滤字段
        $data = $request->except('_token', 'year', 'month', 'day', 'email');

        // 取出邮箱
        $email = $request->email;

        // 取出用户id号
        $id = session('user')->id;

        // 修改邮箱
        \DB::table('user')->where('id', $id)->update(['email' => $email]);

        // 取出session里的id
        $uid = session('user')->id;

        // 查询老的图片
        $oldAvatar = \DB::table('userdetail')->where('uid', $uid)->first()->photo;

        // 移动文件
        if($request->hasFile('photo')) {

            if($request->file('photo')->isValid()) {

                // 获取扩展名
                $ext = $request->file('photo')->extension();
                // dd($ext);
                // 随机文件名
                $filename = time().mt_rand(1000000,9999999).'.'.$ext;
                // 移动
                $request->file('photo')->move('./uploads/user',$filename);

                // 删除老图片
                if(file_exists('./uploads/user/'.$oldAvatar) && $oldAvatar != 'default.jpg')
                {
                    unlink('./uploads/user/'.$oldAvatar);
                }

                // 添加data数据
                $data['photo'] = $filename;
            }
        }
        
        // 获取到年月日
        $year = $request['year'];
        $month = $request['month'];
        $day = $request['day'];

        // 拼成一个字符
        $data['birth'] = $year.'#'.$month.'#'.$day;

        // 执行修改
        $res = \DB::table('userdetail')->where('uid', $uid)->update($data);

        // 判断
        if ($res) {
        	return redirect('home/userdetail/edit')->with(['info' => '添加成功']);
        }else{
        	return back()->with(['info' => '添加失败']);
        }
    }
}
