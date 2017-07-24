<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>后台登录</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('admin/project/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/project/bootstrap/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('admin/project/bootstrap/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/project/dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin/project/plugins/iCheck/square/blue.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page" style="height:600px;background:url('/admin/project/dist/img/bj-xia.jpg');background-size: cover;background-repeat: no-repeat;background-position: center center;">
    <div class="container" >
      <div class="row">
        <div class="col-md-7">
         
        </div>
          <div class="col-md-5" >
            <div class="login-box" >
              <div class="login-logo">
                <a href="#"><b>{{ config('app.name') }}</b></a>
              </div>
              <!-- /.login-logo -->
              <div class="login-box-body" style="height:400px;">
                <div style="height:10px;"></div>
                <p class="login-box-msg" style="font-size:20px;">请登录</p>
                @if(session('info'))
                    <p class="text-denger">{{ session('info') }}</p>
                @endif
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                       <p class="text-denger">{{ $error }}</p>
                    @endforeach
                @endif
                <form action="/admin/dologin" method="post">
                    {{ csrf_field() }}
                  <div class="form-group has-feedback">
                    <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="用户名">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  <div style="height:10px;"></div>
                  <div class="form-group has-feedback">
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="密码">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-xs-7">
                          <div class="form-group has-feedback">
                            <input type="text" name="code" class="form-control" placeholder="验证码">
                          </div>
                        </div>
                        <div class="col-xs-5">
                            <a onclick="javascript:re_captcha();" ><img src="{{ URL('kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="100" height="34" id="c2c98f0de5a04167a9e427d883690ff6" border="0"></a>
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                      <div class="row">
                        <div class="col-xs-8">
                          <div class="checkbox icheck">
                            <label>
                              <input name="remember_me" type="checkbox"> 记住我
                            </label>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                          <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                        </div>
                        <!-- /.col -->
                      </div>
                </form>
                <!-- /.social-auth-links -->
                  <div style="height:20px;"></div>
                  <a href="{{ url('home/forgetpass/') }}">忘记密码 ?</a><br>

              </div>
              <!-- /.login-box-body -->
            </div>
          </div>
        </div>
      <!-- /.login-box -->
        </div>
      </div>
<!-- jQuery 2.2.3 -->
<script src="{{ asset('admin/project/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('admin/project/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('admin/project/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
});
  // 点击刷新
    function re_captcha() {
        $url = "{{ URL('kit/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
    }
     
</script>
</body>
</html>
