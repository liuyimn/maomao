<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="Shortcut Icon" href="//img.58cdn.com.cn/n/tuan/v3/favicon.ico" type="image/x-icon" /> 
    <meta charset="UTF-8">
    <title>大脸猫二手交易-用户登录</title>
    <script type="text/javascript">document.domain = '58.com';try{var ____json4fe = {catentry:{dispid:'',name:'',listname:''},locallist:{dispid:'',name:'',listname:''},modules:'passport'}}catch(e){};</script>
    <link rel="stylesheet" href="{{ asset('/home/login/Css/indexlogin_v20170418164603.css') }}"/>
    <script src="{{ asset('/home/login/Scripts/jquery-1.8.3.js') }}"></script>

</head>
<body>
    <img src="Picture/reg-bg.png" alt="" width="100%" height="100%" class="bg-img" style=";
    ">
    <div id="overlay"></div>
    <div id="loginContent">
        <div id="outregBox">
            <div id="backtoindex"><a href="{{ url('/') }}"  onclick="clickLog('from=PC_login_fh');">返回首页</a></div>
            <div id="goReg">没有账户？<a href="{{ url('/home/register/register') }}" onclick="clickLog('from=PC_login_zc');">去注册</a></div>
        </div>
        <div class="wrap">
           <a id="logoHref" href="{{ url('/') }}"><img style="width:130px;height:130px;margin-top:-40px;margin-left:186px" src="{{ asset('home/login/Images/logoko.png') }}" alt=""></a>
            <div id="loginBox" class="loginBox ">
               <form name="submitForm_new" method="post"  action="{{ url('/home/login/dologin') }}" > 
               {{ csrf_field() }}
                  
                <ul id="userlogin_ul" class="formInput">             
                  <!--用户名-->              
                  <li class="usernameliUser">                  
                    <span class="logpic_new">用户名</span>                 
                      <input type="text"  value="{{ old('username') }}" id="usernameUser" autocomplete="off" name="username"  size="20"  class="passport-login-input username_new"  maxlength="" name="email"  placeholder="手机号  /账户名  /邮箱">                  
                    <span id="usernameTip" class="wrong1"></span>              
                  </li>              
                  <!--密码-->              
                  <li class="passwordliUser">                 
                    <span class="logpic_new">密码</span>                  
                      <input class="passport-login-input password_new" type="password" autocomplete="off" name="password" id="passwordUserText"  size="20"  maxlength="16" placeholder="密码"style="display: inline-block;"  />                  
                      <input class="passport-login-input password_new" type="password" autocomplete="off" name="" id="passwordUser"  size="20"  maxlength="16" placeholder="密码" style="display: none;"  />
                    @if(session('info'))                  
                    <span id="passwordTip" class="wrong1" style="display:block" > 
                    {{session('info')}}
                    </span>
                    @else
                    <span id="passwordTip" class="wrong1" style="display=block" ></span>
                    @endif             
                  </li>              
                  <!--图片验证码-->              
                          
                  <li class="commitcode_new">              
                    <a href="{{ url('home/forgetpass') }}" class="passwordonclick="  onclick="clickLog(  'from=PC_login_zm_wjmm  ');">忘记密码</a>                  
                      <input type="checkbox" name="remember_me" id="isremember_id_new">                  
                    <span>下次自动登录</span>                              
                  </li>             
                <li class="submit_new">                  
                  <input type="submit" id="btnSubmitUser" class="submit" value="登录" class="btns_new" accesskey="l" id="btnSubmit_new"  />              
                </li>          
                </ul>      
              </form>      
            </div>
        </div>
        <div class="login-footer">
            <span id="footerTip" href="javascript:;">maomao.com</span><span>|</span><a href="" target="_blank">联系客服</a><span>|</span><a href="#" target="_blank">帮助</a>
        </div>
    </div>
    <div id="weixinConBg" class="wx-qrcodebg hide"><span id="close-wx"></span></div>
    <script src="{{ asset('/home/login/Scripts/indexlogin_v20170517174927.js')}}"></script>
    <!--基本统计代码begin-->
   
    <!--基本统计代码end-->
    <script src="{{ asset('/home/login/Scripts/referrer4.js')}}"></script>
    <script>
        $('#usernameUser').on('blur',function(){
            var username = $(this).val();
            if(username){
                // alert(username);
                $.get('/home/login/ajax',{'username':username},function(data){
                    if(data == 2)
                    {
                        $('#usernameTip').html('该用户不存在').css('display','block');

                        $('#btnSubmitUser').click(function(){

                            return false;

                        });
                    }

                    if(data == 1){
                        $('#usernameTip').html(' ').css('block','none');
                        $('#btnSubmitUser').click(function(){
                            window.location.href='/home/login/dologin';
                        });
                    }
                });
            }else{

                $('#btnSubmitUser').click(function(){

                    $('#usernameTip').html('用户名不能为空').css('display','block');
                    return false;
                });
            }
               
        });


    </script>
</body>
</html>