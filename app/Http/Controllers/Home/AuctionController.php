<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuctionController extends Controller
{
    /**
    *
    *   @return    加载前台拍卖页面
    */
    //引入拍卖页面
    public function index()
    {
    	return view('home.auction.index');
    }

    /**
    *   @return    重定向返回结果
    *   @param     $request 发送过来的数据
    */
    // 执行添加页面
    public function insert(Request $request){

    	// 表单验证
		$this->validate($request, [
	            'name' => 'required|unique:auction|max:18',
	            'oldpage' => 'required',
	            'newpage' => 'required',
	            'pic' => 'required',
	            'content' => 'required',
	            'endtime' => 'required',
	            'agreement' => 'required',
	        ],[
	            'name.max' => '商品名最长18个字符',
	            'name.required' => '商品名不能为空',
	            'name.unique' => '商品名已存在',
	            'oldpage.required' => '原价不能为空',
	            'newpage.required' => '现价名不能为空',
	            'pic.required' => '商品图片不能为空',
	            'content.required' => '商品描述不能为空',
	            'endtime.required' => '拍卖时间不能为空',
	            'agreement.required' => '请选中服务协议',
	        ]);
    	
    	// 取出原价
    	$old = $request->oldpage;
    	// 取出现价
    	$new = $request->newpage;
    	// 去出拍卖时间
    	$end = $request->endtime;

    	// 正则原价是否是数字
    	$red = preg_match_all('/^\d{1,4}$/', $old);

    	// 判断是否正确
    	if(!$red) 
    	{
    		return back()->with(['info' => '现价必须是数字']);
    	}

    	// 正则现价是否是数字
    	$ren = preg_match_all('/^\d{1,4}$/', $new);

    	// 判断是否正确
    	if(!$ren) 
    	{
    		return back()->with(['info' => '现价必须是数字']);
    	}

    	// 正则拍卖时间
    	$ree = preg_match_all('/^([1-9]|10)$/', $end);

    	// 判断是否正确
    	if(!$ree)
    	{
    		return back()->with(['info' => '拍卖时间必须是1-10小时且不能超过10小时']);
    	}


    	// 过滤token 
    	$data = $request->except('_token', 'agreement');

    	// 处理图片
        if($request->hasFile('pic')){

            if($request->file('pic')->isValid()){

                // 获取扩展名
                $ext = $request->file('pic')->extension();
                // dd($ext);
                // 随机文件名
                $filename = time().mt_rand(1000000,9999999).'.'.$ext;
                // 移动
                $request->file('pic')->move('./uploads/auction',$filename);
                // 把新的图片名称存入数组
                $data['pic'] = $filename;
            }
        }

    	// 创建添加时间
        $data['starttime'] = time();

        // 执行添加数据库
    	$res = \DB::table('auction')->insert($data);

    	// 判断是否成功
    	if ($res) 
    	{
    		return redirect('/')->with(['info' => '添加成功']);
    	}else{
    		return back()->with(['info' => '添加失败']);
    	}

    }


}
