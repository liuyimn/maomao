@extends('admin.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        分类管理
        <small>添加</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">分类管理</a></li>
        <li class="active">添加分类</li>
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
            <form role="form" action="{{ url('/admin/category') }}" method="post" enctype="multipart/form-data">
            	
              	<div class="box-body"  style="width: 50%;">
              	{{ csrf_field() }}
	              	<div class="form-group">
      						@if(session('info'))
      			            <div class="alert alert-danger">
      							{{ session('info') }}
      						</div>
      						@endif
	                  	<label for="exampleInputName">分类名</label>
	                  	<input type="text" name="name" class="form-control" id="exampleInputName" placeholder="请输入分类名" value="{{ old('name') }}">
	                </div>
	                <div class="form-group">
      						<label for="exampleInputName2">父分类</label>
      						<select name="pid" id="exampleInputName2" class="form-control">	
      							<option value="0">根分类</option>

      							@foreach($data as $key => $val)
      								<option value="{{ $val->id }}">{{ $val->name }}</option>
      							@endforeach

      						</select>
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