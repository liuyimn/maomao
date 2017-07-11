@extends('admin.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        广告管理
        <small>列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/index') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">广告管理</a></li>
        <li class="active">列表</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">快速查看广告列表</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              @if(session('info'))
                <div class="alert alert-danger">
                    {{ session('info') }}
                </div>
              @endif

              <table id="example2" class="table table-bordered table-hover" style="table-layout:fixed;">
                <thead>
                <tr>
                  <th style="text-align:center;">ID</th>
                  <th style="text-align:center;">广告标题</th>
                  <th style="text-align:center;">广告简介</th>
                  <th style="text-align:center;">广告login</th>
                  <th style="text-align:center;">开始存在时间</th>
                  <th style="text-align:center;">广告结束时间</th>
                  <th style="text-align:center;">广告状态</th>
                  <th style="text-align:center;">操作</th>
                </tr>
                </thead>
                <tbody>
                    
                @foreach($data as $key=>$val)			
                <tr class="parent">
                  <td style="text-overflow:ellipsis;text-align:center;">{{ $val->id }}</td>
                  <td style="text-overflow:ellipsis;text-align:center;">{{ $val->title }}</td>
                  <td style="text-overflow:ellipsis;text-align:center;">{{ $val->connect }}</td>
                  <td style="text-overflow:ellipsis;text-align:center;"><img src="/uploads/advert/{{ $val->pic }}" width="50px"></td>
                  <td style="text-overflow:ellipsis;text-align:center;">{{ date('Y-m-d H:i:s',$val->s_time) }}</td>
                  <td style="text-overflow:ellipsis;text-align:center;">{{ $val->e_time }}</td>
                  <td style="text-overflow:ellipsis;text-align:center;">{{ $arr[$val->status] }}</td>
                  <td style="text-overflow:ellipsis;text-align:center;"><a href="{{ url('/admin/advert/edit') }}/{{ $val->id }}">编辑</a> | 
                      <a href="{{ url('/admin/advert/delete') }}/{{ $val->id }}">删除</a>|
                      @if($val->status == 1)
                      <a href="{{ url('/admin/advert/upstatus') }}/{{ $val->id }}/{{ $val->status }}">开启</a>
                      @elseif($val->status == 0)
                      <a href="{{ url('/admin/advert/upstatus') }}/{{ $val->id }}/{{ $val->status }}">关闭</a>
                      @endif
                  </td>
                </tr>
                @endforeach


                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


@endsection
