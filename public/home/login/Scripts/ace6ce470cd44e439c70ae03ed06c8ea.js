(function() {
 
	var isLogin = '';
	var _path = '';
	if(isLogin == 'true' && _path != ''){
		window.location.href = _path;
	}
	var loadJS = function(url){
	    var oHead = document.getElementsByTagName('head').item(0); 
		var script = document.createElement('script');
		script.src = url;
		script.type = "text/javascript";
		oHead.appendChild(script); 
	}
    var ppt_obj = function(isSend, divId) {
        //内部变量初始化
        var isSending = isSend;
        var pdivid = 'userPwdLogin';

        var domStr = '<form name="submitForm_new" method="post"  action="\/\/passport.58.com\/login\/dologin"  id="submitForm_new" target="formSubmitFrame_new">\r\n        <input type="hidden" name="source" id="sourceUser" value="pc-login">\r\n        <input type="hidden" name="path" id="pathUser" value="http:\/\/bj.58.com\/diannao\/?zz=zz&pts=1499325364111">\r\n        <input type="hidden" name="password" id="p1User">\r\n        <input type="hidden" name="timesign" id="timesignUser">\r\n        <input type="hidden" name="isremember" id="isrememberUser" value="false">\r\n        <input type="hidden" name="callback" value="successFun">\r\n        <input type="hidden" id="yzmstateUser" name="yzmstate" value="">\r\n        <input type="hidden" id="fingerprint" name="fingerprint" value="">\r\n        <input type="hidden" id="finger2" name="finger2" value="">\r\n        <input type="hidden" name="tokenId" class="getTokenId_new" id="getTokenIdUser" autocomplete="off" value="">\r\n\r\n\r\n        <ul id="userlogin_ul" class="formInput">\r\n            <!-用户名-->\r\n            <li class="usernameliUser">\r\n                <span class="logpic_new">用户名<\/span>\r\n                <input type="text"  value="" id="usernameUser" autocomplete="off" name="username"  size="20"  class="passport-login-input username_new"  maxlength="" name=""  placeholder="手机号\/账户名\/邮箱">\r\n                <span id="usernameTip" class="wrong1"><\/span>\r\n            <\/li>\r\n            <!--密码-->\r\n            <li class="passwordliUser">\r\n                <span class="logpic_new">密码<\/span>\r\n                 <input class="passport-login-input password_new" type="text" autocomplete="off" name="" id="passwordUserText"  size="20"  maxlength="16" placeholder="密码"style="display: inline-block;"\/>\r\n                <input class="passport-login-input password_new" type="password" autocomplete="off" name="" id="passwordUser"  size="20"  maxlength="16" placeholder="密码" style="display: none;"\/>\r\n                <span id="passwordTip" class="wrong1"><\/span>\r\n            <\/li>\r\n            <!--图片验证码-->\r\n            <li class="validcodeliUser" id="validcodeliUser" style="display:none" >\r\n                <span class="logpic_new">验证码<\/span>\r\n                <input type="text" name="validcode"  class="validateCode_new passport-login-input account" id="validateCodeUser"  placeholder="图片验证码">\r\n                <input type="hidden" name="vcodekey" class="vcodekey_new" id="vcodekeyUser" autocomplete="off" value="">\r\n                <img id="vcodeImg"  name="vcodeImg" style="cursor: pointer; height:32px;" src="">\r\n                <span id="validcodeTip" class="wrong1"><\/span>\r\n\r\n\r\n            <\/li>\r\n            <li class="commitcode_new">\r\n            <a href="\/\/passport.58.com\/forgetpassword" class="passwordonclick="  onclick="clickLog(\'from=PC_login_zm_wjmm\');">忘记密码<\/a>\r\n                <input type="checkbox" id="isremember_id_new">\r\n                <span>下次自动登录<\/span>                \r\n            <\/li>\r\n            <li class="submit_new">\r\n                <input type="submit" id="btnSubmitUser" class="submit" name="btnSubmit" value="登录" class="btns_new" accesskey="l" id="btnSubmit_new"\/>\r\n            <\/li>\r\n        <\/ul>\r\n    <\/form>\r\n    <input type="hidden" id="rsaExponent" name="rsaExponent" value="010001">\r\n    <input type="hidden" id="rsaModulus" name="rsaModulus" value="008baf14121377fc76eaf7794b8a8af17085628c3590df47e6534574efcfd81ef8635fcdc67d141c15f51649a89533df0db839331e30b8f8e4440ebf7ccbcc494f4ba18e9f492534b8aafc1b1057429ac851d3d9eb66e86fce1b04527c7b95a2431b07ea277cde2365876e2733325df04389a9d891c5d36b7bc752140db74cb69f">\r\n    <input type="hidden" id="isvalidcode" name="" value="false">\r\n    <input type="hidden" id="password_value" name="password_value" value="">\r\n    <input type="hidden" id="callback_others" name="callback_others" value="usernameLoginSucc">\r\n    <input type="hidden" id="win" name="win" value="">\r\n    <iframe id="formSubmitFrame_new" name="formSubmitFrame_new" src="\/\/passport.58.com\/submit" style="visibility: hidden; height: 0px; width: 0px;"><\/iframe>\r\n\r\n\r\n\r\n';

        //是否显示 图片验证码
        var imgyzm = '';


        //是否显示checkbox-- 明文密码按钮
        var showpasswordcodebtn ='false';

        //是否显示checkbox-- 记住密码按钮
        var showcommitcode = 'true';

        var source = '';

        //if(pdivid == ""){
            //pdivid = $("body");
            //如果没有传入divid的话,将strDomappend到body内
       // }

        //图片验证码的显示   显示规则,是否是接受参数判断
        //图片验证码动态添加到div内的,
        function showvalidcode() {
			var vcodekey = '';
            $(".imgyzmli_new").show();
            var html =$( '<span class="logpic_new">验证码</span>'+
                '<input type="text" name="validcode" class="validateCode_new" id="validateCode_new" autocomplete="off"/>'+
                '<img src="//passport.58.com/validcode/get?vcodekey='+vcodekey+'" id="vcodeImg_new" name="vcodeImg_new"align="absmiddle">'+
              	'<input type="hidden" name="vcodekey" class="vcodekey_new" id="vcodekey_new" autocomplete="off" value=' +
                vcodekey +'/>'+
                '<a class="validatacodea_new" href="javascript:void(0)">看不清？</a>');
            $(".imgyzmli_new").append(html);
           
        }

        // 返回对外接口
        return {
            /**
             * 将div的数据写入到div中去
             */
            "insertToDiv": function() {
                if(pdivid == ""){
                    document.write(domStr)
                 }else{
                     $("#"+pdivid).html(domStr);
                }
                loadJS("https://bsp.api.qcloud.com/v2/index.php?Action=GetWebJs&siteKey=0dzdbNj2mD7%2f%2bml6RMSvBLhWpxwRKbpHfFrMysm7D8T0Z6uFdxKAVMeXXSjkuzW%2f")
                loadJS("https://passport.58.com/static_js/js/login/ppstore_v20161102144259.js");
				loadJS("https://passport.58.com/static_js/js/login/ppfingerprint_v20161217150440.js");
                loadJS("https://passport.58.com/static_js/js/login/passport_fingerprint2_v20170526153213.js");
                
                //是否显示验证码
                if(imgyzm == "code"){
                    showvalidcode();
                }

                if("" == 'false'){
                	$("#password_new").val("passWord123");
                }
                //是否显示记住密码
                if(showcommitcode == 'true'){
                    $(".commitcode_new").show();
                }else{
                    $(".commitcode_new").hide();
                }
                //是否显示可见密码按钮
                if(showpasswordcodebtn == 'true'){
                    $(".showpasswordcodebtn_new").show();
                }else{
                    $(".showpasswordcodebtn_new").hide();
                }
            }
           
        };
    }();

    // 插入字符串
    ppt_obj.insertToDiv();
    
    loadJS("https://passport.58.com/static_js/resource/xxzl/tracker/tracker.sp.min_v20170524141057.js");
    //pc username login pc用户名密码登录
    setTimeout(function(){
	    var _conf = {
	        clientType: '1',
	        buttonId: ['^btnSubmit_new'],
	                 //用户名输入框      //密码输入框      //图片验证码输入框      //下次自动登录输入框
	        inputId: ['^username_new','^password_new','^validateCode_new','$forgetcode_new'],
	                  //用户名密码登录提交按钮
	        triggerId:['^btnSubmit_new']
	    };
	    window.__tracker.init(_conf);
    
    },500);
    
})();

