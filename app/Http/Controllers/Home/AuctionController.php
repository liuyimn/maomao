<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

date_default_timezone_set('PRC');

class AuctionController extends Controller
{
    //拍卖页面
    public function index(Request $request){

        //定义分页
        $num = '10';

        //默认关键字为空
        $keywords = $request->input('keywords', '');

        //多表关联查询
        $data = \DB::table('auction')
                    ->join('user', 'auction.uid', '=', 'user.id')
                    ->join('userdetail', 'user.id', '=', 'userdetail.uid') 
                    ->where('auction.status','=','0')
                    ->where('auction.name', 'like', '%'.$keywords.'%')
                    ->select('auction.*', 'userdetail.nickname', 'userdetail.photo')
                    ->paginate($num);

        //遍历出数据值;
        foreach ($data as $key => $value) {
            
            //时间戳更换为年月日
            $value->starttime = date("Y-m-d H:i:s",$value->starttime);

            //按空格拆分
            $time = explode(' ',$value->starttime); 

            //制造当前时间戳
            $ntime = date("Y-m-d");

            //定义一个状态数组
            $da = ['status' => '1'];
           
            //如果当前商品日期不等于当前日期
            // if($time[0] != $ntime){

            //     //修改当前商品状态为已过期
            //     $res = \DB::table('auction')->where('id', $value->id)->update($da);

            // }
        }

        //测试商品
        $res = \DB::table('shop')->limit(5)->get();

        //拍卖状态为0的显示
        $obj = \DB::table('auction')->where('status', '0')->count();

        return view('home.auct.index', ['title' => '商品拍卖', 'data' => $data, 'res' => $res, 'obj' => $obj]);

    }


    //拍卖商品详情
    public function show($id){

        //商品信息查询
        $data = \DB::table('auction')->where('id', $id)->first();
        
        //查询卖家信息
        $res = \DB::table('user')->where('id', $data->uid)->first();
        
        //查询卖家的详细信息
        $user = \DB::table('userdetail')
                    ->join('auction', 'auction.uid', '=', 'userdetail.uid')
                    ->where('userdetail.uid', $res->id)
                    ->first();

        //测试
        $jx = \DB::table('shop')->where('tid', 193)->limit(5)->get();

        return view('home.auct.show',['title' => '商品详情', 'data' => $data, 'res' => $res, 'user' => $user, 'jx' => $jx]);

    }


    /**
    *
    *   @return    加载前台拍卖页面
    */
    //引入拍卖页面
    public function add()
    {
        return view('home.auct.add');
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
            ],[
                'name.max' => '商品名最长18个字符',
                'name.required' => '商品名不能为空',
                'name.unique' => '商品名已存在',
                'oldpage.required' => '原价不能为空',
                'newpage.required' => '现价名不能为空',
                'pic.required' => '商品图片不能为空',
                'content.required' => '商品描述不能为空',
                'endtime.required' => '拍卖时间不能为空',
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


        // 添加用户信息
        $data['uid'] = session('user')->id;


        // 创建添加时间
        $data['starttime'] = time();


        // 执行添加数据库
        $res = \DB::table('auction')->insert($data);


        // 判断是否成功
        if ($res) 
        {
            return redirect('/home/auct/index')->with(['info' => '添加成功']);
        }else{
            return back()->with(['info' => '添加失败']);
        }


    }

}