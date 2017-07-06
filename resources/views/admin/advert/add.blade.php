@extends('admin.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        广告管理
        <small>添加</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">广告管理</a></li>
        <li class="active">添加广告</li>
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
                  <label for="exampleInputPassword6">广告开始时间</label>
                  <input class="form_datetime form-control" name="s_time" id="exampleInputPassword6" type="text" value="{{ date('Y-m-d') }}" size="16">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">广告结束时间</label>
                  <input class="form_datetime form-control" name="e_time" id="exampleInputPassword4" type="text" value="{{ date('Y-m-d') }}" size="16">
                </div>
               <div class="form-group">
                  <label for="exampleInputPassword5">是否开启</label>
                  <select class="form-control" id="exampleInputPassword5" name="status">
                      <option value="0">开启</option>
                      <option value="1">关闭</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">广告图片上传:</label><br/>
                  <a href="javascript:;" class="file">请选择图片<input type="file" name="pic" id="exampleInputPassword1"></a>
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

@section('js')
  <script type="text/javascript">
      $(".form_datetime").datetimepicker({
          format: "yyyy-mm-dd",
          autoclose: true,
          todayBtn: true,
          todayHighlight: true,
          showMeridian: true,
          pickerPosition: "bottom-left",
          language: 'zh-CN',//中文，需要引用zh-CN.js包
          startView: 2,//月视图
          minView: 2//日期时间选择器所能够提供的最精确的时间选择视图
      });    
  </script>
@endsection

