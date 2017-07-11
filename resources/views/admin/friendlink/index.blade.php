@extends('admin.layout')

@section('content')
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        友情链接管理
        <small>友情链接列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin/index') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">友情链接管理</a></li>
        <li class="active">友情链接列表</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">友情链接列表</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
		@if(session('info'))
     			<div class="alert alert-danger">
     				{{ session('info') }}
     			</div>
     		@endif
              <table style="table-layout:fixed ;" id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="text-align:center">友情链接ID</th>
                  <th style="text-align:center">友情链接名称</th>
                  <th style="text-align:center">友情链接地址</th>
                  <th style="text-align:center">友情链接描述</th>
                  <th style="text-align:center">友情链接logo</th>
                  <th style="text-align:center">友情链接位置</th>
                  <th style="text-align:center">操作</th>
                </tr>
                </thead>
                <tbody>
					@foreach($data as $key=>$val)
						<tr style="text-align:center">
							<td style="text-overflow:ellipsis; line-height:50px;">{{ $val->id }}</td>
							<td style="text-overflow:ellipsis; line-height:50px;">{{ $val->linkname }}</td>
							<td style="text-overflow:ellipsis; line-height:50px;">{{ $val->url }}</td>
							<td style="text-overflow:ellipsis; line-height:50px;">{{ mb_substr($val->content,0,8).'...' }}</td>
							<td style="text-overflow:ellipsis; line-height:50px;"><img style="width:50px;" src="/uploads/avatar/{{ $val->logo }}" alt=""></td>
							<td style="text-overflow:ellipsis; line-height:50px;">第{{ $val->ordernum }}位</td>
							<td style="text-overflow:ellipsis; line-height:50px;"><a href="{{ url('/admin/friendlink/edit') }}/{{ $val->id }}">编辑</a> | <a href="{{ url('/admin/friendlink/delete') }}/{{ $val->id }}">删除</a></td>				
						</tr>
					@endforeach
                	
                </tfoot>
              </table>
              
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