 <?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    // 收货地址也
    public function index()
    {
    	// 把查到的数据发送到页面
    	$data = \DB::table('address_list')->get();
    	// 返回页面
    	return view('home.address.index', ['data' => $data]);
    }

    // 添加页面
    public function add()
    {
    	// 返回页面
    	return view('home.address.add');
    }

    // 执行添加
    public function insert(Request $request)
    {	
    	// 表单验证
    	$this->validate($request, [
            'name' => 'required',
            'addressa' => 'required',
            'addressb' => 'required',
            'user_adress' => 'required',
            'phone' => 'required|min:11|max:11'
        ],[
            'name.required' => '姓名不能为空',
            'addressa.required' => '地址不能为空',
            'addressb.required' => '地址不详细',
            'user_adress.required' => '详细地址不能为空',
            'phone.required' => '手机号不能为空',
            'phone.min' => '手机号码不正确',
            'phone.max' => '手机号码不正确',
        ]);

        $data = $request->except('_token', 'addressa', 'addressb', 'addressc', 'user_adress');

        // 
        if($request['addressc'] != '0') {
        	$data['address'] = $request['addressa'].$request['addressb'].$request['addressc'].$request['user_adress'];
        }else{
        	$data['address'] = $request['addressa'].$request['addressb'].$request['user_adress'];
        }

        $data['uid'] = '1';

        // dd($data);

        $res = \DB::table('address_list')->insert($data);

        if($res)
        {
        	return redirect('home/address/index')->with(['info' => '添加成功']);
        }else{
        	return back()->with(['info' => '添加失败']);
        }
        
    }

    // 添加页面
    public function edit($id)
    {
    	// 查询数据库
    	$data = \DB::table('address_list')->where('id', $id)->first();
    	// 把数据发送到页面
    	return view('home.address.edit', ['data' => $data]);
    }

    // 执行修改
    public function update(Request $request)
    {
    	// 过滤
    	$data = $request->except('_token', 'id');

    	// dd($data);
    	$res = \DB::table('address_list')->where('id', $request->id)->update($data);

    	// 判断
    	if($res){
    		return redirect('home/address/index')->with(['inof' => '添加成功']);
    	}else{
    		return back()->with(['info' => '添加失败']);
    	}
    }

    // 执行删除
    public function delete($id)
    {
    	// 去数据库查询
    	$res = \DB::table('address_list')->delete($id);

    	// 判断
    	if($res)
    	{
    		return back()->with(['info' => '删除成功']);
    	}else{
    		return back()->with(['info' => '删除失败']);
    	}
    }

}
