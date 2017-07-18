//运营活动页面公用js文件
document.domain = "suning.com";
//获取并格式化cookie
function d(b) {
	var a;
	return (a = document.cookie.match(RegExp("(^| )" + b + "=([^;]*)(;|$)"))) ? decodeURIComponent(a[2]
		.replace(/\+/g, " "))
		: null
}
// 获取当前城市cookie
    var _snCityIdCookie = function (b) {
        var a;
        return (a = document.cookie.match(RegExp("(^| )" + b + "=([^;]*)(;|$)"))) ? decodeURIComponent(a[2]
            .replace(/\+/g, "%20"))
            : null
    };
// 基于jquery
	//替换链接中的cityId
	var setSearchCity = function (selector) {
		var city = $(selector);
		if (city != null && city.length > 0) {
			//绑定mouseover事件，替换cityId=xxx
			city.live("mouseover", function () {
				replaceCityParam(this);
			});
			//绑定onclick事件，替换{cityId}占位符，忽略大小写
			city.click(function(){
				replaceCityPlaceHolder(this);
			})
		}
	};
	
	//替换cityId参数cityId=xxx
	function replaceCityParam(obj){
		var cityId =  _snCityIdCookie("cityId") || "9173";
		var href=$(obj).attr("href");
		//判断是否cityId为最后一个参数，是的话不需要加&,否则要加&
		var split=href.match(/cityId=.*&/gi)==null?"":"&";
		//替换cityId=后面的字符串或数字，直到第一个&或结尾，忽略大小写
		$(obj).attr("href", href.replace(/cityId=.*?&|cityId=.*$/gi, "cityId="+cityId+split));
	}
	
	//替换城市id占位符{cityId}
	function replaceCityPlaceHolder(obj){
		var cityId =  _snCityIdCookie("cityId") || "9173";
		url = $(obj).attr("href").replace(/{cityId}/gi, cityId).replace(/%7bcityId%7d/gi, cityId);
		$(obj).attr("href", url);
	}

	//创建在页面引入外部js文件的script标签的方法开始
	function _loadAsyncJs(src) {
	    var _src = src;
	    var _scripts = document.getElementsByTagName('script');
	    for (var i = 0; i < _scripts.length; i++) {
	        if (_scripts[i].src == _src) {
	            return;
	        }
	    }
	    var _script = document.createElement('script');
	    _script.type = 'text/javascript';
	    _script.async = true;
	    _script.src = _src;
	    var _s = _scripts[0];
	    _s.parentNode.insertBefore(_script, _s);
	}
	//创建在页面引入外部js文件的script标签的方法结束

	//判断环境，设置js文件路径开始
	function _getJsFilePath(js_file) {
	    var _hostName = document.location.hostname;
	    // 一般生产环境的域名 		
	    var _prd_reg = ".suning.com";
	    // 一般pre环境的域名
	    var _pre_reg = "pre.cnsuning.com";
	    // 一般sit环境的域名
	    var _sit_reg = "sit.cnsuning.com";
	    //以上为一般情况下各种环境(sit,pre,prd)的域名格式，如果自己系统环境的域名格式不同，请根据实际情况制定

	    var sa_src = "";
	    if (_hostName.indexOf(_prd_reg) != -1) {
	        sa_src = ("https:" == document.location.protocol) ? "https://imgssl.suning.com" : "http://script.suning.cn";
	    } else if (_hostName.indexOf(_pre_reg) != -1) {//sit系统
	        sa_src = ("https:" == document.location.protocol) ? "https://preimgssl.suning.com" : "http://prescript.suning.cn";
	    } else if (_hostName.indexOf(_sit_reg) != -1) {
	        sa_src = ("https:" == document.location.protocol) ? "https://sit1imgssl.suning.com" : "http://sit1script.suning.cn";
	    } else {
	        sa_src = ("https:" == document.location.protocol) ? "https://imgssl.suning.com" : "http://script.suning.cn";
	    }
	    sa_src = sa_src + "/javascript/sn_da/" + js_file;
	    return sa_src;
	}
	//判断环境，设置js文件路径结束
    
    //全局变量   
    if(typeof $(document).on === 'function' && typeof snSidebarSpOpen != 'undefined' && snSidebarSpOpen === true){    
        var sn = sn || {
            "cookieDomain":'.suning.com', 
            "online":'online.suning.com',
            "context": "/emall",
            "domain": "www.suning.com",
            "storeId": "10052",
            "catalogId": "10051",
            "memberDomain": "member.suning.com",
            "cookieDomain": ".suning.com",
            "categoryId": "0",
            "searchDomain": "http://search.suning.com/emall/",
            "hasSidebar":true
        };
    }    
    $(function () {
        $("body").addClass("cityId_replace");
        //通用cityId替换
        setSearchCity(".cityId_replace a,.cityId_replace area");
        _loadAsyncJs(_getJsFilePath("da_opt.js"));
        if(typeof $(document).on === 'function' && typeof snSidebarSpOpen != 'undefined' && snSidebarSpOpen === true){
            $.getScript("http://res.suning.cn/public/v3/js/search.min.js?201501014", function(){
                $.getScript("http://res.suning.cn/project/ocs/js/chatCompat_mini.js?201501014", function(){
                    $.getScript("http://res.suning.cn/public/v3/js/SFE.base.min.js?201501014", function(){
                        $.getScript("http://res.suning.cn/public/sidebar/build/js/sn-sidebar.min.js?201501014", function(){});
                    })
                })
            }); 
        }
    });












