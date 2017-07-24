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
            <form role="form" method="post" action="{{ url('/admin/manage/insert') }}">
            {{ csrf_field() }}
              <div class="box-body">
               <fieldset  id="city_china_val">
                  <p>所在地区：
                  <select class="province cxselect form-control" name="province" data-value="北京市" data-first-title="选择省" disabled="disabled" style="width:150px;"></select><br/>
                  <select class="city cxselect form-control"  name="city" data-value="东城区" data-first-title="选择市" disabled="block" style="width:150px;"></select><br/>
                  <!-- <select class="area cxselect form-control" name="area" data-value="" data-first-title="选择地区" disabled="disabled" style="width:150px;"></select><br/> -->
                </p>
              </fieldset>
               <div class="form-group">
                  <label for="exampleInputEmail1">代理人</label>
                  <input type="text" style="width:500px;" class="form-control" name="uname"  value="" id="exampleInputEmail1" placeholder="代理人姓名名">
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
<script>
$.cxSelect.defaults.url = '/admin/project/bootstrap/js/cityData.min.json';

$('#city_china_val').cxSelect({
  selects: ['province', 'city'],
  nodata: 'none'
});

</script>
@endsection
