<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
<title>猫猫二手市场-重置密码</title>

<link type="text/css" rel="stylesheet" href="{{ asset('/home/forget/reset.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('/home/forget/layout.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('/home/forget/registerpwd.css') }}">
<!-- <link type="text/css" rel="stylesheet" href="{{ asset('/home/forget/bootstrap.min.css') }}"> -->
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
      <h4 class="title_big30">重置密码</h4>
    </div>
    <form action="{{ url('/home/forget/updatepass') }}" method="post" id="resetPwdForm">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $id }}">
      <div class="regbox">
        <div class="step3">                  
          <dl>
            <dt><h4>请重设您的帐号密码</h4></dt>
            <dd>
              <div class="inputbg">
                <!-- 错误添加class为err_label -->
                <label class="labelbox" for="">
                  <input id="pwd" name="password" placeholder="请输入新密码" type="password">
                </label>        
              </div>
            </dd>
            <dd>
              <div class="inputbg">
                <!-- 错误添加class为err_label -->
                <label class="labelbox" for="">
                  <input id="repwd" name="re_password" placeholder="请输入确认密码" type="password">
                </label>        
              </div>
            </dd>
          </dl>        
          <div id="dd" class="err_tip">
            <div class="dis_box">
              <em  class="icon_error"></em>
              <span id="error_con"></span>
            </div>
          </div>
          <div class="err_tip pwd_tip" id="pwd_tips" style="display:block;">
            <div class="dis_box">
              <em class="icon_error"></em>
              <b><span id="sp" style="color:#ccc"></span></b>
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
          <div class="fixed_bot mar_phone_dis3">
            <input id="butt" class="btn332 btn_reg_1" value="提交" type="submit">
          </div>    
        </div>      
      </div>
    </form>         
  </div>
  </div>
</div>
</div>
<script src="{{ asset('/home/forget/jquery-1.8.3.min.js') }}"></script>
<script>

//初始状态值
var btn = false;
$('#pwd').on('blur',function(){

    //获取输入的值
    var num = $(this).val();
    console.log(num);
    var reg = /^[0-9A-Za-z]{6,16}$/;

    // //验证输入的内容是否符合要求
    var res = reg.test(num);

    if(res){
        btn = true;
        $('#sp').html('该密码可以使用');
        $('#dd').css('display','none');
        $('#error_con').html('');
    }else{
        $('#dd').css('display','block');
        $('#error_con').html('请重新输入密码');
    }
});

$('#butt').on('click',function(){
    if(btn){
        return true;
    }else{
        return false;
    }
});

</script>