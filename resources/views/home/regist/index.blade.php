<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>注册</title>
    <script src="/home/regist/Scripts/jquery1.3.2_v0.js"></script>
    <script src="/home/regist/Scripts/ppt_security.js"></script>
    <script src="/home/regist/Scripts/jquery-1.8.3.min.js"></script>
    <script src="/home/regist/Scripts/placeholders.min.js"></script>
    <link rel="stylesheet" href="/home/regist/Css/mobile_reg_v20170316155512.css"/>
</head>
<body>
    <img src="/home/regist/Picture/reg-bg.png" alt="" width="100%" height="100%" style="z-index:-1;position:fixed;_position:absolute;left:0;right:0;bottom:0;top:0;_left:expression(eval(document.documentElement.scrollLeft+document.documentElement.clientWidth-this.offsetWidth)-(parseInt(this.currentStyle.marginLeft,10)||0)-(parseInt(this.currentStyle.marginRight,10)||0));_top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0)));">
    <div id="overlay"></div>
    <div id="regContent">
        <div id="outregBox">
            <div id="backtoindex"><a href="http://www.58.com">返回首页</a></div>
            <div id="goLogin">已有账户？<a href="#">去登录</a></div>
        </div>
        <div class="wrap">
            <div id="regLogo"><img style="width:150px;margin-left:180px;" src="/home/regist/Images/logo2x.png" ></div>
            <form action="" method="post">
              {{ csrf_field() }}
            <div id="regBox" class="regBox">
                <ul id="regUl" class="regUl">      
                <!--手机号-->     
                    <li id="regMobileLi" class="regLi regMobile">         
                        <span class="regLable">手机号</span>         
                        <input type="text" placeholder="手机号" name="mobile" id='regMobile' class="regMobile regInput" maxlength="11" autocomplete="off" />         
                        <input type="button" id='regGetcodeBtn' class="regGetcodeBtn"  value="获取验证码" />      
                    </li>     
                    <li id="regMobileTip" class="regMobileTip regMobileTipClear regTip">         
                       <span id="regMobileTipText" class="regTipText regMobileTipTextKeep"></span>          
                    </li>      
                <!--短信验证码-->     
                    <li id="regMobileCodeLi" class="regLi regMobileCodeLi">         
                        <span class="regLable">验证码</span>         
                        <input type="text" placeholder="验证码" id="regMobileCode" class="regMobileCode regInput" maxlength="6" autocomplete="off" />
                    </li>     
                    <li id="regMobileCodeTip" class="regMobileCodeTip regMobileCodeTipClear regTip">         
                        <span id="regMobileCodeTipText" class="regTipText"></span>             
                    </li>          
                <!--username-->     
                    <li id="regMobileUsernameLi" class="regLi regMobileUsernameLi">         
                        <span class="regLable">用户名</span>       
                        <input type="text" placeholder="用户名" name="name" id="regMobileUsername" class="regMobileUsername regInput" maxlength="20" autocomplete="off">   
                    </li>          
                    <li id="regMobileUsernameTip" class="regMobileUsernameTip regMobileUsernameTipClear regTip">            
                         
                    </li>            
                    <!--设置密码-->     
                    <li id="regPasswordLi" class="regLi">         
                        <span class="regLable">设置密码</span>         
                        <input type="password" placeholder="设置密码" id="regPasswordText" class="regPassword regInput" maxlength="16" autocomplete="off" />         
                    </li>      
                    <li id="regPasswordTip" class="regPasswordTip regPasswordTipClear regTip">          
                        <span id="regPasswordTipText" class="regTipText"></span>         
                        <div id="passwordlevelBox" class="passwordlevelBox">            
                            <span id="passwordlevel1" class="passwordlevel passwordlevelon">弱</span>             
                            <span id="passwordlevel2" class="passwordlevel">中</span>             
                            <span id="passwordlevel3" class="passwordlevel">强</span>          
                        </div>       
                    </li>      
                    <!--确认密码-->     
                    <li id="regRepasspordLi" class="regLi">         
                        <span class="regLable">确认密码</span>         
                        <input type="password" placeholder="确认密码" id="regRepasswordText" class="regRepassword regInput" maxlength="16" autocomplete="off" />         
                        <input type="password" placeholder="确认密码" id="regRepassword" class="regRepassword regInput" maxlength="16" autocomplete="off" style="display: none" />     
                    </li>     
                    <li id="regRepasswordTip" class="regRepasswordTip regRepasswordTipClear regTip">         
                        <span id="regRepasswordTipText" class="regTipText"></span>     
                    </li>      
                    <!--登录按钮-->     
                    <li id="regButtonLi"  class="regButtonLi regLi">         
                        <div id="regAgreementBox">             
                            <input type="checkbox" checked="checked" id="regAgreementCheckbox" />                         
                            <span>我已阅读并同意                             
                                <a id="regAgreement" target="_blank" href="">《大脸猫使用协议》</a>                        
                            </span>          
                        </div>         
                        <div class="regButtonBox">             
                            <input type="button" value="注册" id="regButton" class="regButton" />         
                        </div>     
                    </li>  
                </ul> 


                    <div id="regValidcodeBox" class="regValidcodeBox" style="display: none">     
                        <div id="regValidcodeTipTextBox">        
                            <span id="regValidcodeTipText"  class="regValidcodeTipText regTipText">请输入图片验证码</span>      
                        </div>    
                        <div id="regValidcodeInputBox" class="regValidcodeInputBox">         
                            <input type="text" placeholder="图片验证码" id="regValidcode" class="regValidcode regInput" maxlength="11" autocomplete="off">         
                            <img id="regValidImg" class="" src="">     
                        </div>     
                        <div id="regValidcodeBtnbox" class="regValidcodeBtnbox">         
                            <input type="button" value="确定" id="regValidcodeImgBtn" class="regValidcodeBtn"  autocomplete="off">       
                        </div>    
                        <div id="regVoiceValidcodeBtnbox" class="regValidcodeBtnbox" style="display: none">         
                            <input type="button" value="确定" id="regVoiceValidcodeImgBtn" class="regValidcodeBtn"  autocomplete="off">     
                        </div>     
                        <div id="regValidcodeClose" class="regValidcodeClose">
                        </div> 
                    </div> 
                    <div id="regValidcodeBg" class="regValidcodeBg" style="display: none">
                    </div>
            </div>
            </form>


        </div>
	    <div class="login-footer">
	        <span id="footerTip" href="">.com</span><span>|</span><a href="" target="_blank">联系客服</a><span>|</span><a href="" target="_blank">帮助</a>
	    </div>
    </div>
    <script>

        
   		
   		// 手机号失去焦点事件
   		$('#regMobile').blur(function(){

            var phone = $(this).val();

            $.get('/home/regist/registajax', {phone:phone}, function (data){

                var res;

                if (data == '0')
                {
                    res = '请填写正确的手机号';
                    $('#regGetcodeBtn').attr('class', 'regGetcodeBtn');
                    $('#regMobileTip').css('display', 'block').html('<span id="regMobileTipText" class="regTipText regMobileTipTextKeep">'+ res +'</span>');

                }else if(data == '1'){
                    res = '你输入的手机号码已存在';
                    $('#regGetcodeBtn').attr('class', 'regGetcodeBtn');
                    $('#regMobileTip').css('display', 'block').html('<span id="regMobileTipText" class="regTipText regMobileTipTextKeep">'+ res +'</span>');
                }else if(data == '2'){
                    $('#regGetcodeBtn').attr('class', 'regGetcodeBtn regGetcodeBtnOn');
                    $('#regMobileTip').css('display', 'none');
                }
                                    
            });

   		});
        
        $('#regMobileUsername').blur(function(){

            var name = $(this).val();

            $.get('/home/regist/registajax', {name:name}, function ({

                // alert(data);
                var res;

                if (data == '0')
                {

                    res = '必须以英文字符开头5到16位';

                    $('#regMobileUsernameTip').css('display', 'block').html('<span id="regMobileTipText" class="regTipText regMobileTipTextKeep">'+ res +'</span>');

                }else if(data == '1'){

                    res = '你输入的用户已存在';

                    $('#regMobileUsernameTip').css('display', 'block').html('<span id="regMobileTipText" class="regTipText regMobileTipTextKeep">'+ res +'</span>');

                }else if(data == '2'){

                    $('#regMobileUsernameTip').css('display', 'none');

                }
                                    
            });
 
        });

   	</script>
</body>
</html>