@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        用户管理
        <small>添加</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/index') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="active">添加用户</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">快速添加</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('/admin/config/update') }}" style="width:50%" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
              
              @if(session('info'))
              <div class="alert alert-danger">
                  {{ session('info') }}
              </div>
              @endif

              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                
                <div class="form-group">
                  <label for="exampleInputName">网站名称</label>
                  <input type="text" name="webname" class="form-control" value="{{ $data->webname }}" id="exampleInputName" placeholder="请输入网站名称">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">网站关键字</label>
                  <input type="text" name="keywords" class="form-control" value="{{ $data->keywords }}" id="exampleInputEmail1" placeholder="请输入网站关键字">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">网站版权</label>
                  <input type="text" name="copy" class="form-control" value="{{ $data->copy }}" id="exampleInputEmail1" placeholder="请输入网站版权">
                </div>
              	  <div class="form-group">
                  <label for="exampleInputPassword4">网站状态</label>
                  <select class="form-control" id="exampleInputPassword4" name="status">
                      <option value="0" @if(!empty($data->status) && $data->status==0) selected="selected" @endif>关闭</option>
                      <option value="1" @if(!empty($data->status) && $data->status==1) selected="selected" @endif>开启</option>
                  </select>
               	 </div>
               	<div class="form-group">
                  <label for="exampleInputPassword3">网站logo</label><br/>
                 <a href="javascript:;" class="file">选择文件<input type="file" name="logo" id=""></a>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword3">当前logo</label><br/>
                 <img style="width:50px; height:50px;" src="/uploads/config/{{ $data->logo }}" alt="">
                </div>
              </div>
              <!-- /.box-body -->


              <div class="box-footer">
                <button type="submit" class="btn btn-primary">编辑</button>
              </div>
            </form>
          </div>
          <!-- /.box -->


        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection