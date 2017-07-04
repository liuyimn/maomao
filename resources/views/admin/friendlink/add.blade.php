@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        友情链接
        <small>添加友情链接</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">友情链接</a></li>
        <li class="active">添加友情链接</li>
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
            <form role="form" method="post" enctype="multipart/form-data" action="{{ url('/admin/friendlink/insert') }}">
            {{ csrf_field() }}
              <div class="box-body" style="width:50%">
                <div class="form-group">
                  <label for="exampleInputEmail1">友情链接名称</label>
                  <input type="text" class="form-control" name="linkname"  value="" id="exampleInputEmail1" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">友情链接地址</label>
                  <input type="text" class="form-control" name="url"  value="" id="exampleInputEmail1" >
                </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1">友情链接描述</label><br/>
                  <textarea name="content" id="" cols="30" rows="10" style="resize: none; width:100%; height:150px;" ></textarea>
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">友情链接排序</label>
                  <select name="ordernum" id="">
                  	<option value="1">第1位</option>
                  	<option value="2">第2位</option>
                  	<option value="3">第3位</option>
                  	<option value="4">第4位</option>
                  	<option value="5">第5位</option>
                  	<option value="6">第6位</option>
                  	<option value="7">第7位</option>
                  	<option value="8">第8位</option>
                  	<option value="8">第9位</option>
                  	<option value="9">第10位</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">友情链接logo</label><br/>
                  <a href="javascript:;" class="file">选择文件<input type="file" name="logo" id=""></a>
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