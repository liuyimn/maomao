@extends('Admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>积分管理<small>积分列表</small></h1>
				<ol class="breadcrumb">
					<li><a href="{{ url('/admin/index') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
					<li><a href="#">积分管理</a></li>
					<li class="active">积分列表</li>
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
							<form action="{{ url('/admin/nums/index') }}" method="get">
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
						  	<table style="table-layout:fixed ;" id="example2" class="table table-bordered table-hover">
						        <thead>
						            <tr>
						              <th style="text-align: center;">用户ID</th>
						              <th style="text-align: center;">用户昵称</th>
						              <th style="text-align: center;">用户积分</th>
						              <th style="text-align: center;">积分状态</th>
						              <th style="text-align: center;">冻结积分</th>
						              <th style="text-align: center;">操作</th>
						            </tr>
						        </thead>
						        <tbody style="text-align: center;">

						        	<!-- 遍历数据库信息 -->
									@foreach($data as $key=>$val)

								        <tr class="parent">
								            <td class="ids" style="line-height: 50px;">{{ $val->uid }}</td>
								            <td style="line-height: 50px;text-overflow:ellipsis;">{{ $val->nickname }}</td>
								            <td style="line-height: 50px;text-overflow:ellipsis;">{{ $val->num }}</td>
								            
								            <!-- 判断显示信息 -->
								            @if($val->num_status == '0')
									        <td style="line-height: 50px;text-overflow:ellipsis;">正常</td>
											@elseif($val->num_status == '1')
											<td style="line-height: 50px;text-overflow:ellipsis;">已冻结</td>
											@endif
								            <td style="line-height: 50px;text-overflow:ellipsis;">{{ $val->num_p }}</td>
											
											

								            <td style="line-height: 50px;text-overflow:ellipsis;">
												<!-- 判断显示信息 -->
												@if($val->num_status == '0')
													<a href="{{ url('/admin/nums/update') }}/{{ $val->id }}">冻结</a>  
												@elseif($val->num_status == '1')
													<a href="{{ url('/admin/nums/update') }}/{{ $val->id }}">恢复</a>  
												@endif
												|   <a class="num_p" href="#">异常积分冻结</a>
								            </td>
								        </tr>	
									@endforeach

						        </tbody>
						  	</table>
							{{ $data->appends($request)->links('vendor.pagination.simple-default', ["max" => $max]) }}
						</div>
						<!-- /.box-body -->
					</div>
					<div class="put">
						<div class="zhan"></div>
						<form action="{{ url('/admin/num/edit') }}" method="post">
							<input class="hidden" type="hidden" name="id" value="">
							{{ csrf_field() }}
							<label>冻结多少</label>
							<input class="form-control-xs" type="text" name="num_p">
		                    <button type="submit" class="btn btn-primary">确定</button>
						</form>
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
		$('.num_p').each(function(){
			$(this).on('click', function(){

				var id = $(this).parent().parent().children().first().html();

				$('.put').css('display', 'block');

				$('.hidden').val(id);
			});
		});
	</script>
@endsection