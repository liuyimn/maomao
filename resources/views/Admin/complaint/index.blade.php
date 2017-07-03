@extends('Admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>投诉管理<small>列表</small></h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
					<li><a href="#">投诉管理</a></li>
					<li class="active">列表</li>
				</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
						  <h3 class="box-title">快速查看</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							

							<form action="{{ url('/admin/cpt') }}" method="get">
								<div class="col-md-3">
									<div class="form">
					                  	<select name="num" class="form-control">
					                    <option value="10"
										@if(!empty($request['num']) && $request['num'] == '10'))
											selected="selected" 
										@endif
					                    >10</option>
					                    <option value="20"
										@if(!empty($request['num']) && $request['num'] == '20')
											selected="selected" 
										@endif>20</option>
					                    <option value="30"
										@if(!empty($request['num']) && $request['num'] == '30')
											selected="selected" 
										@endif>30</option>
					                    <option value="50"
										@if(!empty($request['num']) && $request['num'] == '50')
											selected="selected" 
										@endif>50</option>
					                  </select>
					                </div>
								</div>

								<div class="col-md-3 col-md-offset-6">
									<div class="input-group input-group">
						                <input type="text" name="keywords" class="form-control" value="{{ $request['keywords'] or '' }}">
					                    <span class="input-group-btn">
					                    	<button type="submit" class="btn btn-info btn-flat">搜索</button>
					                    </span>
						            </div>
								</div>
							</form>
							
							<br>
							<br>
							<br>
							
				            @if(session('info'))
				            <div class="alert alert-danger">
				                {{ session('info') }}
				            </div>
				            @endif
						  	<table id="example2" class="table table-bordered table-hover">
						        <thead>
						            <tr>
						              <th style="text-align: center;">ID</th>
						              <th style="text-align: center;">投诉人</th>
						              <th style="text-align: center;">投诉内容</th>
						              <th style="text-align: center;">操作</th>
						            </tr>
						        </thead>
						        <tbody style="text-align: center;">
	
									@foreach($data as $key=>$val)
							        <tr>
							            <td>{{ $val->id }}</td>
							            <td>{{ $val->uid }}</td>
							            <td>{{ $val->content }}</td>
							            <td>
											<a href="{{ url('/admin/cpt/delete') }}/{{ $val->id }}">删除</a>
							            </td>
							        </tr>	
									@endforeach

						        </tbody>
						  	</table>
							{{ $data->appends($request)->links() }}
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.box -->
			</div>
		    <!-- /.col -->
		</section>
		<!-- /.content -->
	</div>
  <!-- /.content-wrapper -->
@endsection
