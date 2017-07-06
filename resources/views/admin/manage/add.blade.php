@extends('admin.layout')

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        评论管理
        <small>添加禁言用户</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">评论管理</a></li>
        <li class="active">添加禁言用户</li>
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
            <form role="form" method="post" action="{{ url('/admin/gog/insert') }}">
            <h5>JavaScript:</h5>
<pre class="prettyprint"></pre>

            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">禁言用户名</label>
                  <input type="text" style="width:500px;" class="form-control" name="name"  value="" id="exampleInputEmail1" placeholder="禁言用户名">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">开始禁言时间</label>
                  <!-- <input type="text" style="width:500px;" class="form-control" name="starttime" value="" id="exampleInputPassword1" placeholder="开始禁言时间"> -->
                  <input class="form_datetime form-control" style="width:500px;" name="starttime" type="text" value="{{ date('Y-m-d') }}" size="16">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">结束禁言时间</label>
                  <!-- <input type="text" style="width:500px;" class="form-control" name="endtime" value="" id="exampleInputPassword1" placeholder="结束禁言时间"> -->
                  <input class="form_datetime form-control" style="width:500px;" name="endtime" type="text" value="" size="16">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

   
     

       
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('js')

@endsection
