@extends('admin.layout')

@section('content')
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        用户管理
        <small>列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/index') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="active">用户列表</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">用户列表</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
		
		<form action="/admin/friendlink/index" method="get">
            <div class="row">
            	<div class="col-md-2">
            		<!-- 下拉框 -->
					<div class="form-group">
						
						<select name="num" class="form-control">
							<option value="5"
							@if(!empty($request['num']) && $request['num'] == 5)
							selected="selected" 
							@endif
							>5</option>
							<option value="15"
							@if(!empty($request['num']) && $request['num'] == 15)
							selected="selected" 
							@endif
							>15</option>
							<option value="20"
							@if(!empty($request['num']) && $request['num'] == 20)
							selected="selected" 
							@endif
							>20</option>
							<option value="30"
							@if(!empty($request['num']) && $request['num'] == 30)
							selected="selected"
							@endif 
							>40</option>
							<option value="50"
							@if(!empty($request['num']) && $request['num'] == 50)
							selected="selected"
							@endif 
							>50</option>
						</select>
					</div>
            	</div>
          
            	<div class="col-md-4 col-md-offset-6">
            		<!-- 搜索框 -->
					<div class="input-group input-group-sm">
						<input  value="{{ $request['keywords'] or ''}}" name="keywords" class="form-control" type="text">
						<span class="input-group-btn">
						<button type="submit" class="btn btn-info btn-flat">搜索</button>
						</span>
					</div>	
            	</div>
				
			</div>
		</form>
		@if(session('info'))
     			<div class="alert alert-danger">
     				{{ session('info') }}
     			</div>
     		@endif
              <table style="table-layout:fixed ;" id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="text-align:center">活动ID</th>
                  <th style="text-align:center">活动规则</th>
                  <th style="text-align:center">活动简介</th>
                  <th style="text-align:center">活动美图</th>
                  <th style="text-align:center">状态</th>
                  <th style="text-align:center">操作</th>
                </tr>
                </thead>
                <tbody>
					@foreach($data as $key=>$val)
						<tr style="text-align:center">
							<td style="text-overflow:ellipsis; line-height:50px;">{{ $val->id }}</td>
							<td style="text-overflow:ellipsis; line-height:50px;">{{ $val->rule }}</td>
							<td style="text-overflow:ellipsis; line-height:50px;">{{ mb_substr($val->content,0,8).'...' }}</td>
							<td style="text-overflow:ellipsis; line-height:50px;"><img style="height:50px;" src="/uploads/pop/{{ $val->pic }}"></td>
							<td style="text-overflow:ellipsis; line-height:50px;">{{ $arr[$val->status] }}</td>
							@if($val->status==0)
							<td style="text-overflow:ellipsis; line-height:50px;"><a href="{{ url('/admin/pop/upp') }}/{{ $val->id }}/{{ $val->status }}">下线</a> | <a href="{{ url('/admin/pop/edit') }}/{{ $val->id }}">编辑</a> | <a href="{{ url('/admin/pop/delete') }}/{{ $val->id }}">删除</a></td>
							@else
							<td style="text-overflow:ellipsis; line-height:50px;"><a href="{{ url('/admin/pop/upp') }}/{{ $val->id }}/{{ $val->status }}">恢复</a> | <a href="{{ url('/admin/pop/edit') }}/{{ $val->id }}">编辑</a>  | <a href="{{ url('/admin/pop/delete') }}/{{ $val->id }}">删除</a></td>
							@endif
						</tr>
					@endforeach
                	
                </tfoot>
              </table>
              {{ $data->appends($request)->links() }}
            </div>
            <!-- /.box-body -->
          </div>
    
        
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection