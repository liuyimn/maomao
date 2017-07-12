<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
<title>猫猫二手市场-重置密码</title>

<link type="text/css" rel="stylesheet" href="{{ asset('/home/forget/reset.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('/home/forget/layout.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('/home/forget/registerpwd.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('/home/forget/bootstrap.min.css') }}">
<script src="{{ asset('/home/forget/bootstrap.min.js') }}"></script>

	
</head>
<!-- 添加版本uLocale -->
<body class="zh_CN">
  
<div class="wrapper">
<div class="wrap">
  <div class="layout">  
  <div class="n-frame device-frame reg_frame">
    <div class="external_logo_area"><img style="width:150px;height:150px;margin-left:330px;" src="{{ asset('/home/forget/logoko.png') }}" alt=""></div>
    <div class="title-item t_c">
      <a href="http://mail.{{ $mail }}"><h4 class="title_big30">前往邮箱</h4></a>
    </div>
    <div class="alert alert-danger">发送成功</div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
    @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
    @endforeach
            </ul>
        </div>
    @endif        
  </div>
  </div>
</div>
</div>
<script src="{{ asset('/home/forget/jquery-1.8.3.min.js') }}"></script>
<script>