<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //默认显示10条
        $num = $request->input('num', 10);
        
        //默认关键字为空
        $keywords = $request->input('keywords', '');

        //拍卖列表
        $data = \DB::table('auction')->get();

        //获取搜索字段
        $data = \DB::table('auction')->where('name', 'like', '%'.$keywords.'%')->paginate($num);

        //将数据返回到页面
        return view('admin.auction.index', ['title' => '拍卖列表',  'request' => $request->all() , 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.auction.add', ['title' => '添加拍卖']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        //检测是否合法
        // $this->validate($request, [
        //         'name' => 'required|unique:auction|min:6|max:18',
        //         'oldpage' => 'required',
        //         'newpage' => 'required',
        //         'pic' => 'required',
        //         'content' => 'required',
        //     ],[
        //         'name.min' => '商品名最短6个字符',
        //         'name.max' => '商品名最长18个字符',
        //         'name.required' => '商品名不能为空',
        //         'name.unique' => '商品名已存在',
        //         'oldpage.required' => '原价不能为空',
        //         'newpage.required' => '现价名不能为空',
        //         'pic.required' => '商品图片不能为空',
        //         'content.required' => '商品描述不能为空',
        //     ]);


        //过滤无效字段
        $data = $request->except('_token');

        $data['endtime'] = time();

        dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        //删除拍卖
        $res = $data = \DB::table('auction')->delete($id);

        //判断是否删除成功
        if($res){

            //成功跳转
            return redirect('/admin/auct')->with(['info' => '删除成功']);

        }else{

            //失败跳转
            return back()->with(['info' => '删除失败']);
        }
    }
}
