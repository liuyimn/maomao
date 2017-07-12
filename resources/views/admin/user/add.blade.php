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
            <form role="form" action="{{ url('/admin/user/insert') }}" style="width:50%" method="post" enctype="multipart/form-data">
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
                  <label for="exampleInputName">用户名</label>
                  <input type="text" name="username" class="form-control" value="{{ old('username') }}" id="exampleInputName" placeholder="请输入用户名">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">邮箱地址</label>
                  <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="exampleInputEmail1" placeholder="请输入邮箱地址">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword3">手机号</label>
                  <input  type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="exampleInputPassword3" placeholder="请输入手机号">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">添加管理员</label>
                  <select class="form-control" id="exampleInputPassword4" name="auth">
                      <option value="1">普通用户</option>
                      <option value="2">管理员</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">密码</label>
                  <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="exampleInputPassword1" placeholder="请输入密码">
                </div>
                 <div class="form-group">
                  <label for="exampleInputPassword2">确认 密码</label>
                  <input type="password" name="re_password" value="{{ old('re_password') }}" class="form-control" id="exampleInputPassword2" placeholder="请输入密码">
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
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection
