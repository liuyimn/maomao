@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        活动发布
        <small>添编辑活动</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/index') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">活动发布</a></li>
        <li class="active">编辑活动</li>
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
              <h3 class="box-title">快速编辑</h3>
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
            <form role="form" method="post" enctype="multipart/form-data" action="{{ url('/admin/pop/update') }}">
              <input type="hidden" name="id" value="{{ $data->id }}">
             {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">活动规则</label>
                  <input type="text" class="form-control" name="rule"  value="{{ $data->rule }}" id="exampleInputEmail1" style="width:500px;">
                </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1">活动内容</label><br/>
                  <textarea name="content" id="" cols="30" rows="10" style="resize: none; width:500px; height:150px;" >{{ $data->content }}</textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">活动图片:</label><br/>
                  <a href="javascript:;" class="file">选择文件<input type="file" name="pic" id=""></a><br/>
                  <label for="exampleInputPassword1">当前图片</label><br/>
                  <img style="width:120px;height:50px;" src="/uploads/avatar/{{ $data->pic }}" alt="活动美图">
                </div>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">编辑</button>
              </div>
            </form>
          </div>
 
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection 