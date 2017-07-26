<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
<title>猫猫二手市场-联系卖家</title>

<link type="text/css" rel="stylesheet" href="{{ asset('/home/forget/reset.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('/home/forget/layout.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('/home/forget/registerpwd.css') }}">

	
</head>
<!-- 添加版本uLocale -->
<body class="zh_CN">
  
<div class="wrapper">
<div class="wrap">
  <div class="layout">  
  <div class="n-frame device-frame reg_frame">
    <div class="external_logo_area"><img style="width:150px;height:150px;margin-left:330px;" src="{{ asset('/home/forget/logoko.png') }}" alt=""></div>
    <div class="title-item t_c">
      <h4 class="title_big30">联系卖家</h4>
    </div>
    <form action="{{ url('home/talk/send') }}" method="post" id="forgetpwd_form">
    {{ csrf_field() }}
    <input type="hidden" name="mid" value="{{ $mid }}">
    <input type="hidden" name="sid" value="{{ $sid }}">
    <div class="regbox">
      <h5 class="n_tit_msg">请输入内容：</h5>      
      <div class="inputbg">
        <!-- 错误添加class为err_label -->
        <label class="labelbox labelbox-user" for="user">
                <textarea id="did"  autofocus="autofocus" name="content" style="border:1px solid #f0f0f0;width:460px;resize: none;border-radius:5px;font-size:18px;" name="" id="" cols="10" rows="5"></textarea>
         </label>
      </div>	
      <span id="emailspan" style="display:none;color:red"></span><br/>
      <div class="err_tip error-tip-1">
        <div class="dis_box">
          <em class="icon_error"></em>
          <span id="error-content"></span>
        </div>
      </div> 
       @if(session('info'))
              <p style="color:red">{{ session('info') }}</p>
       @endif
			<div class="err_tip error-tip-2">
				<div class="dis_box"><em class="icon_error"></em><span id="error-content-2"></span></div>
			</div>
      <div class="country_tips c_b">
        nbsp;
        <a class="fr underline" id="select_country_code" href="javascript:void(0)">帮助</a>
      </div>  
      <div class="fixed_bot">
        <input class="btn332 btn_reg_1"  type="submit" id="submit_button" value="发送">   
      </div>
    </div>
    </form>        
  </div>
  </div>
</div>
</div>
<script src="{{ asset('/home/forget/jquery-1.8.3.min.js') }}"></script>
