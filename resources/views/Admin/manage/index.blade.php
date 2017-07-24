@extends('admin.layout')

@section('content')
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        评论管理
        <small>评论列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/index') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">评论管理</a></li>
        <li class="active">禁言列表</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">禁言列表</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
		
		<form action="/admin/gog" method="get">
            <div class="row">
            	<div class="col-md-2">
            		<!-- 下拉框 -->
					<div class="form-group">
						
						<select name="num" class="form-control">
							<option value="10"
							@if(!empty($request['num']) && $request['num'] == 10)
							selected="selected" 
							@endif
							>10</option>
							<option value="25"
							@if(!empty($request['num']) && $request['num'] == 25)
							selected="selected" 
							@endif
							>25</option>
							<option value="50"
							@if(!empty($request['num']) && $request['num'] == 50)
							selected="selected" 
							@endif
							>50</option>
							<option value="70"
							@if(!empty($request['num']) && $request['num'] == 70)
							selected="selected"
							@endif 
							>70</option>
							<option value="100"
							@if(!empty($request['num']) && $request['num'] == 100)
							selected="selected"
							@endif 
							>100</option>
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
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr style="text-align:center">                
                  <th style="text-align:center">代理人</th>
                  <th style="text-align:center">代理省份</th>
                  <th style="text-align:center">代理区域</th>
                  <th style="text-align:center">操作</th>
                </tr>
                </thead>
                @foreach($data as $k => $v)
                	<tr>
                		<td style="text-overflow:ellipsis;text-align:center">{{ $v->uname }}</td>
                		<td style="text-overflow:ellipsis;text-align:center">{{ $v->province }}</td>
                		<td style="text-overflow:ellipsis;text-align:center">{{ $v->city }}</td>
                		<td style="text-overflow:ellipsis;text-align:center"><a href="{{ url('/admin/manage/delete') }}/{{ $v->id }}">删除</a> | <a href="{{ url('/admin/manage/edit') }}/{{ $v->id }}">修改</a></td>
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