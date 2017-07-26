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

        //设置缓存时间
        $minutes = 20;

        //启用缓存系统
        $data = \Cache::remember('auction', $minutes, function(){

            //拍卖列表
            return \DB::table('auction')->where('starttime','desc')->get();

        });

        //获取搜索字段
        $data = \DB::table('auction')->where('name', 'like', '%'.$keywords.'%')->paginate($num);


        $obj = count($data);

        // 进一取整
        $max = ceil($obj/$num);

        //将数据返回到页面
        return view('admin.auction.index', ['title' => '拍卖列表', 'request' => $request->all(), 'data' => $data, 'max' => $max]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加页面
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

       $uid = session('user')->id;

        //检测是否合法
        $this->validate($request, [
                'name' => 'required|unique:auction',
                'oldpage' => 'required',
                'newpage' => 'required',
                'pic' => 'required',
                'connect' => 'required',
            ],[
                'name.required' => '商品名不能为空',
                'name.unique' => '商品名已存在',
                'oldpage.required' => '原价不能为空',
                'newpage.required' => '现价名不能为空',
                'pic.required' => '商品图片不能为空',
                'connect.required' => '商品描述不能为空',
            ]);


        $rep = '/^[0-9]+$/';


        if(!preg_match_all($rep, $request->oldpage) || !preg_match_all($rep, $request->newpage)){

            return back()->with(['info' => '价格或时间请输入数字']);

        }

        //过滤无效字段
        $data = $request->except('_token');

        //测试
        $data['uid'] = $uid;

        //处理图片
        if($request->hasFile('pic')){

            //判断上传图片的名称
            if($request->file('pic')->isValid()){

                //获取扩展名
                $ext = $request->file('pic')->extension();

                //图片新名称
                $filename = time().mt_rand(1000000,9999999).'.'.$ext;

                //移动
                $request->file('pic')->move('./uploads/auction',$filename);

                //往数组里添加新名字
                $data['pic'] = $filename;

            }
        }

        //制造添加时的时间戳
        $data['starttime'] = time();

        //执行添加
        $res = \DB::table('auction')->insert($data);

        //判断添加是否成功
        if($res){

            //删除该项redis数据
            \Cache::forget('auction');

            return redirect('/admin/auct')->with(['info' => '添加成功']);

        }else{

            return back()->with(['info' => '添加失败!请检查']);

        }
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
       
        //修改
        $data = \DB::table('auction')->where('id', $id)->first();

        return view('admin.auction.edit',['title' => '编辑拍卖品', 'data' => $data]);
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
        //检测是否合法
        $this->validate($request, [
            'name' => 'max:18',
            'oldpage' => 'required',
            'newpage' => 'required',
            'connect' => 'required',
        ],[
            'name.max' => '商品名最长18个字符',
            'oldpage.required' => '原价不能为空',
            'newpage.required' => '现价名不能为空',
            'connect.required' => '商品描述不能为空',
        ]);
        

        $rep = '/^[0-9]+$/';


        if(!preg_match_all($rep, $request->oldpage) || !preg_match_all($rep, $request->newpage)){

            return back()->with(['info' => '价格请输入数字']);

        }

        //去除无效字段
        $data = $request->except('_token', 'id', '_method');

        // 查询老图片
        $oldpic = \DB::table('auction')->where('id', $id)->first()->pic;

        //判断是否存在图片
        if($request->hasFile('pic')) 
        {
            //判断提交的pic图片
            if($request->file('pic')->isValid()) 
            {
                // 获取扩展名
                $ext = $request->file('pic')->extension();
                
                // 随机文件名
                $filename = time().mt_rand(1000000,9999999).'.'.$ext;

                // 移动到uploads文件夹
                $request->file('pic')->move('./uploads/auction',$filename);

                // 判断这个路径里面老图片是否存在
                if(file_exists('./uploads/auction/'.$oldpic) && $oldpic != 'default.jpg')
                {   
                    //删除图片
                    unlink('./uploads/auction/'.$oldpic);
                }

                // 添加到data数据
                $data['pic'] = $filename;
            }
        }

        //更新到数据库
        $res = \DB::table('auction')->where('id', $id)->update($data);

        //判断是否更新成功
        if($res){

            //删除该项redis数据
            \Cache::forget('auction');

            return redirect('/admin/auct')->with(['info' => '更新成功']);
        }else
        {
            return back()->with(['info' => '更新失败,清修改内容']);
        }
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

            //删除该项redis数据
            \Cache::forget('auction');

            //成功跳转
            return redirect('/admin/auct')->with(['info' => '删除成功']);

        }else{

            //失败跳转
            return back()->with(['info' => '删除失败']);
        }
    }
}
