@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        活动发布
        <small>添加活动</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">活动发布</a></li>
        <li class="active">添加活动</li>
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
			<!-- 验证字段 -->
     		@if(session('info'))
     			<div class="alert alert-danger">
     				{{ session('info') }}
     			</div>
     		@endif
            <!-- /.box-header -->
      		@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
            <!-- form start -->
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
                </div>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
              </div>
            </form>
          </div>
 
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection 