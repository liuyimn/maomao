@extends('Admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>拍卖管理<small>列表</small></h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
					<li><a href="#">拍卖管理</a></li>
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
							

							<form action="{{ url('/admin/auct') }}" method="get">
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
						              <th style="text-align: center;">拍卖ID</th>
						              <th style="text-align: center;">商品名称</th>
						              <th style="text-align: center;">商品原价</th>
						              <th style="text-align: center;">商品现价</th>
						              <th style="text-align: center;">商品图片</th>
						              <th style="text-align: center;">商品描述</th>
						              <th style="text-align: center;">拍卖时间</th>
						              <th style="text-align: center;">操作</th>
						            </tr>
						        </thead>
						        <tbody style="text-align: center;">
	
									@foreach($data as $key=>$val)
							        <tr class="parent">
							            <td class="ids" style="line-height: 50px;">{{ $val->id }}</td>
							            <td style="line-height: 50px;">{{ $val->name }}</td>
							            <td style="line-height: 50px;">{{ $val->oldpage }}元</td>
							            <td style="line-height: 50px;">{{ $val->newpage }}元</td>
							            <td><img style="width: 50px; height: 50px;" src="{{ url('/uploads/auction') }}/{{ $val->pic }}"></td>
							            <td style="line-height: 50px;">{{ $val->content }}</td>
							            <td style="line-height: 50px;">{{ $val->endtime }}</td>
							            <td style="line-height: 50px;">
											<a href="#" class="del">删除</a>
							            </td>
							            <form style="display: none;" action="{{ url('/admin/auct') }}/{{ $val->id }}" method="post">
											{{ method_field('DELETE') }}
											{{ csrf_field() }}
										</form>
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


@section('js')

	<script type="text/javascript">

		$('.del').on('click',function(){

			$(this).parent().next().submit();
		});								
												
	</script>

@endsection