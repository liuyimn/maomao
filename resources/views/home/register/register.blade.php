<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>猫猫二手商城-注册</title>
   <script src="{{ asset('/home/regist/Scripts/jquery1.3.2_v0.js') }}"></script>
    <script src="{{ asset('/home/regist/Scripts/ppt_security.js') }}"></script>
    <script src="{{ asset('/home/regist/Scripts/placeholders.min.js') }}"></script>
    <script src="{{ asset('/home/regist/Scripts/jquery-1.8.3.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/home/regist/Css/mobile_reg_v20170316155512.css') }}"/>
</head>
<body>
    <img src="/home/regist/Picture/reg-bg.png" alt="" width="100%" height="100%" style="z-index:-1;position:fixed;_position:absolute;left:0;right:0;bottom:0;top:0;_left:expression(eval(document.documentElement.scrollLeft+document.documentElement.clientWidth-this.offsetWidth)-(parseInt(this.currentStyle.marginLeft,10)||0)-(parseInt(this.currentStyle.marginRight,10)||0));_top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0)));">
    <div id="overlay"></div>
    <div id="regContent">
        <div id="outregBox">
            <div id="backtoindex"><a href="{{ url('/') }}">返回首页</a></div>
            <div id="goLogin">已有账户？<a href="{{ url('/home/login/index') }}">去登录</a></div>
        </div>
        <div class="wrap">
            <div id="regLogo"><img style="width:150px;margin-left:180px;" src="/home/regist/Images/logoko.png" ></div>
            <form action="{{ url('/home/register/insert') }}" method="post">
              {{ csrf_field() }}
            <div id="regBox" class="regBox">
                <ul id="regUl" class="regUl">      
                <!--手机号-->     
                    <li id="regMobileLi" class="regLi regMobile">         
                        <span class="regLable">手机号</span>         
                        <input type="text" placeholder="手机号" name="phone" id='regMobile' class="regMobile regInput" maxlength="11" autocomplete="off" />         
                        <input type="button"  id='regGetcodeBtn' class="regGetcodeBtn"  value="获取验证码" />      
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
                        <span id="regMobileCodeTipText" class="regTipText regMobileTipTextKeep"></span>             
                    </li>          
                <!--username-->     
                    <li id="regMobileUsernameLi" class="regLi regMobileUsernameLi">         
                        <span class="regLable">用户名</span>       
                        <input type="text" placeholder="用户名" name="username" id="regMobileUsername" class="regMobileUsername regInput" maxlength="20" autocomplete="off">   
                    </li>          
                    <li id="regMobileUsernameTip" class="regMobileUsernameTip regMobileUsernameTipClear regTip">            
                         <span id="userspan" class="regTipText regMobileTipTextKeep"></span>             
                    </li>            
                    <!--设置密码-->     
                    <li id="regPasswordLi" class="regLi">         
                        <span class="regLable">设置密码</span>         
                        <input type="password" placeholder="设置密码" name="password" id="regPasswordText" class="regPassword regInput" maxlength="16" autocomplete="off" />         
                    </li>      
                    <li id="regPasswordTip" style="display:block" class="regPasswordTip regPasswordTipClear regTip">          
                        <span id="mypass" class="regTipText"></span>         
                        <div id="passwordlevelBox"  class="passwordlevelBox">            
                            <span id="passwordlevel1"  class="passwordlevel">弱</span>            
                            <span id="passwordlevel2" class="passwordlevel">中</span>             
                            <span id="passwordlevel3"   class="passwordlevel">强</span>          
                        </div>       
                    </li>      
                    <!--确认密码-->     
                    <li id="regRepasspordLi" class="regLi">         
                        <span class="regLable">确认密码</span>         
                        <input type="password" placeholder="确认密码" id="regRepasswordText" class="regRepassword regInput" maxlength="16" autocomplete="off" />         
                           
                    </li>     
                    <li id="regRepasswordTip" style="display:none" class="regRepasswordTip regRepasswordTipClear regTip">         
                        <span id="regRepasswordTipText" class="regTipText regMobileTipTextKeep"></span>     
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
                            <input type="submit" value="注册" id="regButton" class="regButton" />         
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
	        <span id="footerTip" href="">maomao.com</span><span>|</span><a href="" target="_blank">联系客服</a><span>|</span><a href="" target="_blank">帮助</a>
	    </div>
    </div>

    <script>
            //定义变量接受用户输入的值
            var val = '';
            var inte = null;
            var code = 0;
            var nums = '';
            var pass = '';
            var relpass = '';

            //设置各个输入框的初始状态
            var stuphone = false;
            var stunum = false;
            var stuname = false;
            var stupass = false;
            var relapss = false;

        
            //随机数函数
            function GetRandomNum(Min,Max)
            {   
                var Range = Max - Min;   
                var Rand = Math.random();   
                return(Min + Math.round(Rand * Range));   
            }   

            //输入事件
            $('#regMobile').on('input',function(){

            //获取输入框输入的值
            val = $(this).val();

            //判断输入框是否有值
            if(val){
                $.get('/home/register/pajax',{phone:val},function(data){
                      //添加表单输入事件
                       
                            //判断返回值 三种状态 1：手机号不合法 2：该手机号已经注册 3：可以使用
                            if(data == 1){

                                //将li的样式设置为显示
                                $('#regMobileTip').css('display','block');

                                 //将span标签里写入值
                                $('#regMobileTipText').html('您输入的手机号码不合法，请重新输入');

                                //设置获取验证码的样式为不可选
                                $('#regGetcodeBtn').attr('class', 'regGetcodeBtn');
                                
                            }
                            if(data == 2){

                                //将li的样式设置为显示
                                $('#regMobileTip').css('display','block');

                                 //将span标签里写入值
                                $('#regMobileTipText').html('该手机号已经注册，请前去登录');

                                //设置获取验证码的样式为不可选
                                $('#regGetcodeBtn').attr('class', 'regGetcodeBtn');
                                
                            }
                            if(data == 3){

                                //将该输入框的状态改为true
                                stuphone = true;   

                                //将li的样式改变为隐藏
                                $('#regMobileTip').css('display','none');

                                //将span中的值清空
                                $('#regMobileTipText').html(' ');

                                if(inte == null){
                                    //设置获取验证码的样式为显示
                                    $('#regGetcodeBtn').attr('class', 'regGetcodeBtn regGetcodeBtnOn');

                                    //设置验证码框的单击事件
                                   $('#regGetcodeBtn').click(function(){

                                        if(inte != null)
                                        {
                                            return false;
                                        }

                                        //声明随机函数
                                        getSmsCode();
                                        function getSmsCode() {  

                                            code = GetRandomNum(0000,9999);
                                            
                                            var url = "http://sms.tehir.cn/code/sms/api/v1/send?srcSeqId=123&account=13126991105&password=a123456&mobile="+val+"&code="+code+"&time=60";
                                            $.ajax({
                                                url: url,
                                                type: "get",
                                                dataType: "json",
                                                success: function (result) {
                                                    if (result.success == false) {
                                                        alert(result.info);
                                                        return;
                                                    } else {
                                                        alert("短信验证码已经发送到您的手机！");
                                                    }
                                                },
                                                error: function (result) {
                                                    console.log(result.valueOf());
                                                },
                                                complete: function (XMLHttpRequest, textStatus) {
                                                }
                                            });
                                        }   

                                        //设置初始事件
                                        num = 60;
                                        //设置定时器
                                        inte = setInterval(function(){
                                            //自减
                                            num--;
                                            //生成按钮显示的字符串
                                            var str = '获取验证码' + '('+num+')';
                                            
                                            //设置样式
                                            $('#regGetcodeBtn').attr('class', 'regGetcodeBtn');
                                            //设置字符串显示
                                            $('#regGetcodeBtn').val(str);

                                            //判断
                                            if(num <= 0){

                                                //生成按钮显示的字符串
                                                var string = '获取验证码';

                                                //设置样式
                                                $('#regGetcodeBtn').attr('class', 'regGetcodeBtn regGetcodeBtnOn');

                                                //设置字符串显示
                                                $('#regGetcodeBtn').val(string);

                                                //清除定时器
                                                clearInterval(inte);
                                                inte = null;
                                            }
                                        },1000);
                                   });
                                }else
                                {
                                    return false;
                                }
                               
                            }
                });
            }
   	  }); 	
        
        $('#regMobile').on('blur',function(){
            if(!val){
                $('#regMobileTip').css('display','block');
                //将span标签里写入值
                $('#regMobileTipText').html('请输入您的手机号码');
                
            }
        });

        //验证码输入事件
        $('#regMobileCode').on('input',function(){

            //获取正在输入的值
            nums = $(this).val();
  
            //判断输入的验证码是否正确
            if(nums != code){
                //如果不正确让样式显示，并提示错误信息
                $('#regMobileCodeTip').css('display','block');
                $('#regMobileCodeTipText').html('验证码不正确');
            }else{
                stunum = true;
                //如果正确让样式隐藏，将错误信息清空
                $('#regMobileCodeTip').css('display','none');
                $('#regMobileCodeTipText').html('');
            } 

            //当输入框失去焦点是输入框内容为空提示错误信息
            $('#regMobileCode').on('blur',function(){
                if(!nums){
                    $('#regMobileCodeTip').css('display','block');
                    $('#regMobileCodeTipText').html('验证码不能为空');
                }
            });
        });

        //用户名正在输入事件
        $('#regMobileUsername').on('blur',function(){

            //获取当前输入的内容
            var name = $(this).val();

            $.get('/home/register/name',{'name':name},function(data){
                if(data == 1){
                    $('#regMobileUsernameTip').css('display','block');
                    $('#userspan').html('该用户名已经存在');
                }

                if(data == 2){
                    stuname = true;
                    $('#regMobileUsernameTip').css('display','none');
                    $('#userspan').html('');
                }
            });
        });

        
        //密码输入事件
        $('#regPasswordText').on('input',function(){

            //获取用户输入的密码
            pass = $(this).val();
            if(!pass){
                $('#passwordlevelBox').css('display','none');
                $('#mypass').html('请输入密码');
                return ;
            }else{
                stupass = true;
                $('#mypass').html('');
            }

            //声明密码强中弱正则
            var reg1 = /^[0-9A-Za-z]{6,16}$/; //弱
            var reg2 = /(?=^.{6,16}$)[0-9A-Za-z]*[^0-9A-Za-z][0-9A-Za-z]*$/;
            var reg3 = /(?=^.{6,16}$)([0-9A-Za-z]*[^0-9A-Za-z][0-9A-Za-z]*){2,}$/;

            var res1 = reg1.test(pass); 
            var res2 = reg2.test(pass);
            var res3 = reg3.test(pass);
         
            if(res1){
                $('#passwordlevelBox').css('display','block');
                $('#passwordlevel1').addClass('passwordlevelon');
                $('#passwordlevel2').removeClass('passwordlevelon');
                $('#passwordlevel3').removeClass('passwordlevelon');

            }else{
                $('#passwordlevelBox').css('display','none');
                $('#passwordlevel1').removeClass('passwordlevelon');
            }
            if(res2 && reg3){
                $('#passwordlevelBox').css('display','block');
                $('#passwordlevel2').addClass('passwordlevelon');
                $('#passwordlevel1').removeClass('passwordlevelon');
                $('#passwordlevel3').removeClass('passwordlevelon');
            }
            if(res1 && res2 && res3){
                $('#passwordlevelBox').css('display','block');
                $('#passwordlevel3').addClass('passwordlevelon');
                $('#passwordlevel1').removeClass('passwordlevelon');
                $('#passwordlevel2').removeClass('passwordlevelon');
            }
                

        });
        
        //确认密码
        $('#regRepasswordText').on('input',function(){

            //获取当前输入的密码
            relpass = $(this).val();

            //判断两次密码
            if(relpass != pass){
                $('#regRepasswordTip').css('display','block');
                $('#regRepasswordTipText').html('两次密码不一致');
            }else{
                relpass = true;
                $('#regRepasswordTip').css('display','none');
                $('#regRepasswordTipText').html('');
            }

        });
        $('#regButton').click(function(){
            if(stuphone && stunum && stupass && stuname && relpass){
                return true;
            }else{
                return false;
            }
        });
   	</script>
</body>
</html>