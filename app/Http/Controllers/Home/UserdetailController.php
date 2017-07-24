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
    		return redirect('home/login/index')->with(['info' => '请登录']);
    	}
    	// 获取用户的id
    	$uid = session('user')->id;

    	// 去数据库查询
    	$data = \DB::table('userdetail')->where('uid', $uid)->first();

        // 拆分年月日
    	$birth = explode('#', $data->birth);

        // 拆分年并判断
        $year = isset($birth[0])?$birth[0]:' ';

        // 拆分月并判断
        $month = isset($birth[1])?$birth[1]:'1';

        // 拆分日并判断
        $day = isset($birth[2])?$birth[2]:'1';

        // 获取到email 邮箱
        $data->email = \DB::table('user')->where('id', $uid)->first()->email;

    	// 把查询到数据发送到页面
    	return view('home.userdetail.edit', ['data' => $data, 'year' => $year, 'month' => $month, 'day' => $day]);
    }

    // 执行修改页面
    public function update(Request $request)
    {
        // 判断用户是的登录
        if(!session('user')) 
        {
            return redirect('home/login/index')->with(['info' => '请登录']);
        }

    	// 验证表单
    	$this->validate($request, [
            'nickname' => 'required',
        ],[
        	'nickname.required' => '昵称不能为空',
        ]);

        // 过滤字段
        $data = $request->except('_token', 'year', 'month', 'day', 'email');

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
    

    //添加邮箱email
    public function email(){
        // 判断是否有用户
        if (!session('user')) 
        {
            return redirect('home/login/index')->with(['info' => '请登录']);
        }
        return view('home.userdetail.email');
    }

    //执行发送邮件
    public function doemail(Request $request){
        // 判断用户是否登登录
        if (!session('user')) 
        {
            return redirect('home/login/index')->with(['info' => '请登录']);
        }

        //获取email
        $email = $request->except('_token');

        //获取用户id
        $id = session('user')->id;

        //根据id查询该用户信息
        $user = \DB::table('user')->where('id',$id)->first();

        //生成随机验证码
        $str = mt_rand(0,999999);

        //发送邮件
        \Mail::send('home.mail.bmail', ['user'=>$user,'str'=>$str], function($message) use($email){

            //要发送的邮件地址
            $message->to($email['email']);

            //标题
            $message->subject('大脸猫二手交易-邮箱绑定');
        });

        return redirect('home/email/con/'.$str.'/'.$email['email']);
        
    }

    //验证验证码页面
    public function con($str,$email){
        // 判断用户是否登录
        if(!session('user')) 
        {
            return redirect()->with(['info' => '请登录']);
        }
     
        return view('home.userdetail.cons',['str'=>$str,'email'=>$email]);
    }

    //执行验证
    public function docon(Request $request){
        // 判断用户是否登录
        if(!session('user'))
        {
            return redirect()->with(['info' => '请登录']);
        }

        //获取传递过来的数据
        $data = $request->except('_token');

        //判断验证码是否正确
        if($data['con'] != $data['str']){
            return back() -> with(['info' => '验证码错误']);
        }

        //获取用户id
        $id = session('user')->id;

        //修改数据库的邮箱
        $res = \DB::table('user')->where('id',$id)->update(['email'=>$data['email']]);

        //判断是否修改成功
        if($res){
            return redirect('home/user/index');
        }else{
            return back()->with(['info'=>'修改失败请重试']);
        }
    }

    //ajax验证邮箱
    public function ajax(Request $request){
        if (!session('user')) 
        {
            return redirect()->with(['info' => '请登录']);
        }

        //获取输入的邮箱
        $email = $request->input('email');

        //去数据库中验证邮箱是否存在
        $res = \DB::table('user')->where('email',$email)->first();

        //判断
        if($res){

            //0为该邮箱已经存在
            return response() -> json('0');
        }else{

            //1为该邮箱可以使用
            return response() -> json('1');
        }
    }
}
