@extends('admin.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        拍卖管理
        <small>添加</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">拍卖管理</a></li>
        <li class="active">添加拍卖</li>
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
			
      			@if (count($errors) > 0)
      				<div class="alert alert-danger">
      					<ul>
      						@foreach($errors->all() as $error)
      							<li>{{ $error }}</li>
      						@endforeach
      					</ul>
      				</div>
      			@endif
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('/admin/auct') }}" method="post" enctype="multipart/form-data">
            	
              	<div class="box-body" style="width: 50%;">
              	{{ csrf_field() }}
	              	<div class="form-group">
          						@if(session('info'))
          			      <div class="alert alert-danger">
          							{{ session('info') }}
          						</div>
          						@endif
	                  	<label for="exampleInputName">商品名称</label>
	                  	<input type="text" name="name" class="form-control" id="exampleInputName" placeholder="请输入商品名称" value="{{ old('name') }}">
  	               </div>

                  <div class="form-group">
                    <label for="exampleInputName2">商品原价</label>
                      <input type="text" name="oldpage" class="form-control" id="exampleInputName2" placeholder="请输入商品原价" value="{{ old('oldpage') }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputName3">商品现价</label>
                    <input type="text" name="newpage" class="form-control" id="exampleInputName3" placeholder="请输入商品现价" value="{{ old('newpage') }}">
                  </div>

                  <input id="lefile" name="pic" type="file" style="display:none">
                  <div class="input-append">
                    <input id="photoCover" name="pic" class="input-large" type="text" style="width:300px; height:34px;" disabled="disabled">
                    <a class="btn" onclick="$('input[id=lefile]').click();">选择商品图片</a>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputName5">商品描述</label>
                    <textarea name="content" style="resize: none; height: 100px;" class="form-control" id="exampleInputName5" placeholder="请输入商品描述">{{ old('content') }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputName6">拍卖时间</label>
                    <input type="text" name="endtime" class="form-control" id="exampleInputName6" placeholder="请输入拍卖时间" value="{{ old('endtime') }}">
                  </div>

              	</div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
                <button type="reset" class="btn btn-primary">重置</button>
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
  $('input[id=lefile]').change(function() {
    $('#photoCover').val($(this).val());
  });
</script>

@endsection