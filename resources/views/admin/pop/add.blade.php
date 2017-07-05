@extends('admin.layout')

@section('content')
<<<<<<< HEAD:resources/views/admin/pop/add.blade.php
  <!-- Content Wrapper. Contains page content -->
=======

<!-- Content Wrapper. Contains page content -->
>>>>>>> 954216cc41cc06c4c6a03c30211f7cc8b4e6703d:resources/views/admin/advert/add.blade.php
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
<<<<<<< HEAD:resources/views/admin/pop/add.blade.php
        活动发布
        <small>添加活动</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">活动发布</a></li>
        <li class="active">添加活动</li>
=======
        广告管理
        <small>添加</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">广告管理</a></li>
        <li class="active">添加广告</li>
>>>>>>> 954216cc41cc06c4c6a03c30211f7cc8b4e6703d:resources/views/admin/advert/add.blade.php
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
<<<<<<< HEAD:resources/views/admin/pop/add.blade.php
			<!-- 验证字段 -->
     		@if(session('info'))
     			<div class="alert alert-danger">
     				{{ session('info') }}
     			</div>
     		@endif
=======
>>>>>>> 954216cc41cc06c4c6a03c30211f7cc8b4e6703d:resources/views/admin/advert/add.blade.php
            <!-- /.box-header -->
            <!-- form start -->
<<<<<<< HEAD:resources/views/admin/pop/add.blade.php
            <form role="form" method="post" enctype="multipart/form-data" action="{{ url('/admin/pop/insert') }}">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">活动规则</label>
                  <input type="text" class="form-control" name="rule"  value="" id="exampleInputEmail1" style="width:500px;">
                </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1">活动内容</label><br/>
                  <textarea name="content" id="" cols="30" rows="10" style="resize: none; width:500px; height:150px;" ></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">活动图片:</label><br/>
                  <a href="javascript:;" class="file">选择文件<input type="file" name="pic" id=""></a>
=======
            <form role="form" action="{{ url('/admin/advert/insert') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body"  style="width:50%">
              
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
                  <label for="exampleInputName">广告标题</label>
                  <input type="text" name="title" class="form-control" value="{{ old('title') }}" id="exampleInputName" placeholder="请输入广告名">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">广告内容</label>
                  <input type="text" name="connect" class="form-control" value="{{ old('connect') }}" id="exampleInputEmail1" placeholder="请输入广告内容">
                </div>
                 <div class="form-group">
                  <label for="exampleInputPassword1">广告图片上传:</label><br/>
                  <a href="javascript:;" class="file">请选择图片<input type="file" name="pic" id="exampleInputPassword1"></a>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">广告结束时间</label>
                  <input type="text" name="e_time" class="form-control" value="{{ old('e_time') }}" id="exampleInputPassword4" placeholder="请输入时间">
                </div>
               <div class="form-group">
                  <label for="exampleInputPassword5">是否开启</label>
                  <select class="form-control" id="exampleInputPassword5" name="status">
                      <option value="0">开启</option>
                      <option value="1">关闭</option>
                  </select>
>>>>>>> 954216cc41cc06c4c6a03c30211f7cc8b4e6703d:resources/views/admin/advert/add.blade.php
                </div>
              
              </div>
              <!-- /.box-body -->


              <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
              </div>
            </form>
          </div>
<<<<<<< HEAD:resources/views/admin/pop/add.blade.php
 
=======
          <!-- /.box -->
            

        </div>
        <!--/.col (left) -->
       
>>>>>>> 954216cc41cc06c4c6a03c30211f7cc8b4e6703d:resources/views/admin/advert/add.blade.php
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<<<<<<< HEAD:resources/views/admin/pop/add.blade.php
@endsection 
=======
  <!-- /.content-wrapper -->


@endsection

>>>>>>> 954216cc41cc06c4c6a03c30211f7cc8b4e6703d:resources/views/admin/advert/add.blade.php
