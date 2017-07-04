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
            
            <form action="{{ url('admin/user/index') }}" method="get">
                <div class="row"> 
                    <!-- select -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <select name="num" class="form-control">
                                <option value="5"
                                @if(!empty($request['num']) && $request == '5')
                                    selected="selected" 
                                @endif
                                >5</option>
                                <option value="10"
                                @if(!empty($request['num']) && $request['num'] == '10')
                                    selected="selected" 
                                @endif
                                >10</option>
                                <option value="50"
                                @if(!empty($request['num']) && $request['num'] == '50')
                                    selected="selected" 
                                @endif
                                >50</option>
                                <option value="100"
                                @if(!empty($request['num']) && $request['num'] == '100')
                                    selected="selected" 
                                @endif
                                >100</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-6">
                       <div class="input-group input-group">
                            <input value="{{ $request['keywords'] or '' }}" name="keywords" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-info btn-flat">搜索!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>

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

              {{ $data->appends($request)->links() }}
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
