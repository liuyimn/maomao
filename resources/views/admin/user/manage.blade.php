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
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="active">列表</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">快速查看用户列表</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              @if(session('info'))
                <div class="alert alert-danger">
                    {{ session('info') }}
                </div>
              @endif

              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>用户名</th>
                  <th>邮箱</th>
                  <th>最后登录时间</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
                    
                @foreach($data as $key=>$val)			
                <tr class="parent">
                  <td class="ids">{{ $val->id }}</td>
                  <td class="name">{{ $val->username }}</td>
                  <td>{{ $val->email }}</td>
                  <td>{{ date('Y-m-d H:i:s', $val->lastlogin) }}</td>
                  <td><a href="{{ url('/admin/user/edit') }}/{{ $val->id }}">编辑</a> | 
                      <a href="#" class="del" data-toggle="modal" data-target="#myModal">删除</a>
                  </td>
                </tr>
                @endforeach


                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


@endsection

@section('js')
<script>

    var id = 0;
    $(".del").on('click',function(){
        id = $(this).parents('.parent').find('.ids').html();
    });

</script>
@endsection
