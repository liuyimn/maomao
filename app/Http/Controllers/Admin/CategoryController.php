<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //分类列表
        $data = \DB::table('type')->select("*", \DB::raw("concat(path,',',id) As sort_path"))->orderBy('sort_path')->get();

        //chuli
        foreach ($data as $key => $val) {
            
            $num = substr_count($val->path, ',');

            $data[$key]->name = str_repeat('|---', $num).$data[$key]->name;

        }

        return view('admin.category.index', ['title' => '分类列表', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //创建分类
        $data = \DB::table('type')->select("*", \DB::raw("concat(path,',',id) As sort_path"))->orderBy('sort_path')->get();

        //chuli
        foreach ($data as $key => $val) {
            
            $num = substr_count($val->path, ',');

            $data[$key]->name = str_repeat('|---', $num).$data[$key]->name;

        } 



        return view('admin.category.add', ['title' => '分类添加', 'data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //分类添加
        $data = $request->except('_token');

        if($data['pid'] == 0){

            $data['path'] = 0;
            $data['status'] = 1;

        }else{

            //查询父path
            $path = \DB::table('type')->where('id', $data['pid'])->first()->path;

            //拼接分类路径
            $data['path'] = $path.','.$data['pid'];

            //分类状态
            $data['status'] = 1;

        }

        $res = \DB::table('type')->insert($data);

        if($res){
            return redirect('/admin/category/create')->with(['info' => '添加成功']);
        }else{
            return redirect('/admin/category/create')->with(['info' => '添加失败']);
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
        //
        //所有分类
        $alldata = \DB::table('type')->select("*", \DB::raw("concat(path,',',id) As sort_path"))->orderBy('sort_path')->get();

        //chuli
        foreach ($alldata as $key => $val) {
            
            $num = substr_count($val->path, ',');

            $alldata[$key]->name = str_repeat('|---', $num).$alldata[$key]->name;

        } 

        //当前分类
        $data = \DB::table('type')->where('id', $id)->first();

        return view('admin.category.edit', ['title' => '分类编辑', 'data' => $data , 'alldata' => $alldata]);
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
        $data = $request->except('_token', '_method');
            
        if($data['pid'] == 0){

            $data['path'] = 0;
            $data['status'] = 1;

        }else{

            //查询父path
            $path = \DB::table('type')->where('id', $data['pid'])->first()->path;

            //拼接分类路径
            $data['path'] = $path.','.$data['pid'];

            //分类状态
            $data['status'] = 1;

        }

        $res = \DB::table('type')->where('id', $id)->update($data);

        if($res){
            return redirect('/admin/category')->with(['info' => '更新成功']);
        }else{
            return back()->with(['info' => '更新失败']);
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
        //删除
        $res = \DB::table('type')->where('pid', $id)->first();

        if($res){
            return back()->with(['info'=>'有子分类,不能删除']);
        }

        $res = \DB::table('type')->delete($id);
        if($res){
            return redirect('/admin/category')->with(['info' => '删除成功']);
        }else{
            return back()->with(['info' => '删除失败']);
        }
    }
}
