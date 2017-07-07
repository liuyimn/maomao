@extends('admin.layout');

@section('content')
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        网站配置
        <small>列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">网站配置</a></li>
        <li class="active">网站信息</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">网站信息</h3>
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
                  <th style="text-align:center">网站名称</th>
                  <th style="text-align:center">网站关键字</th>
                  <th style="text-align:center">网站logo</th>
                  <th style="text-align:center">网站版权</th>
                  <th style="text-align:center">网站状态</th>
                  <th style="text-align:center">操作</th>
                </tr>
                </thead>
                <tbody>
				
						<tr style="text-align:center">
							<td style="text-overflow:ellipsis; line-height:50px;">{{ $data->webname }}</td>
							<td style="text-overflow:ellipsis; line-height:50px;">{{ $data->keywords }}</td>
							<td style="text-overflow:ellipsis; line-height:50px;"><img style="width:50px;" src="/uploads/config/{{ $data->logo }}" alt=""></td>
							<td style="text-overflow:ellipsis; line-height:50px;">{{ $data->copy }}</td>
              <td style="text-overflow:ellipsis; line-height:50px;">{{ $arr[$data->status] }}</td>
							<td style="text-overflow:ellipsis; line-height:50px;"><a href="{{ url('admin/config/edit') }}">编辑</a> | 
              @if($data->status==0)
              <a href="{{ url('admin/config/change') }}/{{ $data->status }}">开启</a>
              @else
              <a href="{{ url('admin/config/change') }}/{{ $data->status }}">关闭</a>
              @endif
              </td>
							
							
						</tr>
				
                	
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