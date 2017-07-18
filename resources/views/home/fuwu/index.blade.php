@extends('home.layout')
@section('content')
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="二手手机,二手交易网,二手市场,猫猫易购二手优品,二手手机交易市场">
<meta name="description" content="猫猫易购猫猫易购二手优品交易平台为您提供二手手机、二手数码、二手家电等二手商品交易，大量的二手闲置物品信息供您查询，免费发布闲置商品转让信息，买卖二手商品，就上猫猫易购二手优品交易平台!">
<title>二手优品-服务保障</title>
<link rel="stylesheet" href="{{ asset('/home/fuwu') }}/a.css">
<script type="text/javascript" src="{{ asset('/home/fuwu') }}/a"></script>

<!--[if IE 6]>
<script type="text/javascript" src="//res.suning.cn/public/js/DD_belatedPNG.js"></script>
<![endif]-->
<script type="text/javascript">
var sn = sn || {
"context" : '/emall',
"domain" : 'www.suning.com',
"storeId" : '10052',
"catalogId" : '10051',
"categoryId" : '10051',
"cityId": "9173",
"memberDomain" : 'member.suning.com',
"online" : 'online.suning.com',
"conline":'conline.suning.com',
"cookieDomain" : '.suning.com',
"searchDomain" : '//search.suning.com/emall/',
"cartDomain" : '//cart.suning.com',
"cartPath" : '//cart.suning.com/emall',
"tuijianDomain" : '//tuijian.suning.com',
"productDomain" : '//product.suning.com',
"chaoshiDomain" : '//chaoshi.suning.com',
"imageDomain" : '//image.suning.cn',
"scriptDomianDir" : '//imgssl.suning.com',
"juDomain":'ju.suning.com',
"elecProductDomain":'//product.suning.com',
"imageDomianDir":'//res.suning.cn',
"imgHost": '//image.suning.cn',
"juImageDomain" : '//image.suning.cn',
"smartDomain" :'//iss.suning.com',
"rxfDomain" : '//sncfc.suning.com',
"cityLESId":"010",
"apiDomain":"//lib.suning.com",
"apsDomainUrl":"//th.suning.com",
"icpsDomain":"//icps.suning.com",
"hyjDomainUrl":"//hyj.suning.com",
"favoriteDomain" : "//favorite.suning.com"
};
</script>
<link rel="stylesheet" href="{{ asset('/home/fuwu') }}/b2c-index.css">
<script type="text/javascript" src="{{ asset('/home/fuwu') }}/passport.js"></script></head>
<body>
<!-- 此处引入公用头部 -->

<!--网站导航 ]]-->
<!-- 消息 [[ -->
<!-- <div class="ng-bar-node-box ng-msg-box">
<a href="//msg.suning.com/" class="ng-bar-node ng-bar-node-msg" name="public0_none_dbgjt_wdxx01" target="_blank">
<span>消息<i class="ng-iconfont dot"></i></span><em class="ng-iconfont down">&#xe62e;</em>
</a>
<div class="ng-d-box ng-msg-child" style="display:none;">
<div class="ng-msg-list">
<div class="ng-msg-item ng-msg-item-no">
<i></i><span>嗷~ 没有新消息...</span>
</div>
</div>
<div class="ng-msg-bottom"><a href="//msg.suning.com/" name="public0_none_dbgjt_wdxx01" target="_blank">查看更多</a></div>
</div>
</div> -->
<!-- 消息 ]] -->
</div>

<script type="text/javascript">
function d(b) {
var a;
return (a = document.cookie.match(RegExp("(^| )" + b + "=([^;]*)(;|$)"))) ? decodeURIComponent(a[2]
.replace(/\+/g, "%20"))
: null
};
var uernameA = d("logonStatus");
var usernameNode = document.getElementById('username-node');
var usernameNodeSlide = document.getElementById('username-node-slide');
var usernameHtml01 = document.getElementById('usernameHtml01') , usernameHtml02 = document.getElementById('usernameHtml02');
var regBarNode = document.getElementById('reg-bar-node');
if (uernameA != null && uernameA != "") {
var uernameC = d("nick");
// if( ((window.sidebar_config && sidebar_config.enable)||sn.hasSidebar) && !sn.hasNewSidebar ){
// usernameNode.style.display = "block";
// }else{
usernameNodeSlide.style.display = "block";
//}
usernameHtml01.innerHTML = uernameC;
usernameHtml02.innerHTML = uernameC;
regBarNode.style.display = "none";
}else{
usernameNode.style.display = "none";
usernameNodeSlide.style.display = "none";
usernameHtml01.innerHTML = " ";
usernameHtml02.innerHTML = " ";
regBarNode.style.display = "block";
}
</script>


<!--***********主体内容区开始******************-->
<!--导航-->
<!-- 导航 代码开始 -->
<div class="second-header clearfix">

<div class="second-navBox">
<div class="commodity-type">
<h3>二手优品</h3>
</div>
<!--其他频道导航-->
<ul class="second-nav clearfix">
<li class="active">
<a href="{{ url('/') }}" target="_blank" name="PcYoupin_shppcser_36726414125_word01" title="">
首页
</a>
</li>
<li>
<a href="" target="_blank" name="PcYoupin_shppcser_36726414125_word02" title="">
闲置二手
</a>
</li>
<li>
<a href="{{ url('/home/tuijian/index') }}" target="_blank" name="PcYoupin_shppcser_36726414125_word03" title="">
聪明之选
</a>
</li>
</ul>
</div>
</div>
<!-- 导航 代码结束 -->
<!--介绍和检测标准-->
<!-- 介绍和检测标准 代码开始 -->
<div class="server-banner"></div>
<div class="white-bg clearfix">
<div class="content-box clearfix">
<h2>什么是猫猫二手优品？</h2>
<p class="describe-what">在猫猫易购上授权销售的非全新数码3C电子产品，包括手机、平板、电脑、相机等。</p>
<img src="{{ asset('/home/fuwu') }}/149325470295975482.jpg" class="classification">
</div>
</div>
<div class="testing-content clearfix">
<h2>猫猫二手优品的检测标准测</h2>
</div>
<!-- 介绍和检测标准 代码结束 -->
<!--品质保证-->
<!-- 品质保证 代码开始 -->
<div class="gray-bg clearfix">
<div class="content-box clearfix">
<h2>
猫猫二手优品怎样保障消费者权益？
</h2>
<div class="rights-interests clearfix">
<p class="rights-title">
猫猫二手优品的商品来源于专业机构回收后再质检，保证行货正品，无翻新，主板无拆修，并做到以下保障：
</p>
<div class="server-quality clearfix">
<dl style="width: 306px;">
<dt><img src="{{ asset('/home/fuwu') }}/149325478233457645.png"></dt>
<dd>
<p>180天质保</p>
<div>180天内非人为质量问题，我们免费解决</div>
</dd>
</dl>
<dl>
<dt><img src="{{ asset('/home/fuwu') }}/149325479992626036.png"></dt>
<dd>
<p>7天无理由退货</p>
<div>购机后7天内不满意，想退就退</div>
</dd>
</dl>
<dl>
<dt><img src="{{ asset('/home/fuwu') }}/149325481801308325.png"></dt>
<dd>
<p>如实描述</p>
<div>交易透明，真实可见，无忧购买</div>
</dd>
</dl>
<dl>
<dt><img src="{{ asset('/home/fuwu') }}/149325483740172182.png"></dt>
<dd>
<p>专业质检</p>
<div>24项专业检测，一项不通过即淘汰</div>
</dd>
</dl>
</div>
</div>
<p class="server-notes">
<span>* 注：</span>
赠品配件不在保修范围内<br>
配件及官网已标注全新或未激活机器不支持无理由退货<br>
部分标注官翻的商品享受官方售后以特殊说明为准<br>
</p>
</div>
</div>
<!-- 品质保证 代码结束 -->
<!--分级标准-->
<!-- 分级标准 代码开始 -->
<div class="white-bg clearfix">
<div class="content-box clearfix">
<h2>二手优品的商品分级标准</h2>
<p class="grading-standar">
99新：没有使用痕迹 外观全新 屏幕显示正常<br>
95新：细微使用痕迹 外观细微磨损划伤 屏幕显示正常<br>
9成新：轻微使用痕迹 外观有轻微划痕与磕碰 屏幕显示正常<br>
8成新：明显使用痕迹 外观有明显划痕与磕碰 屏幕有轻微划痕<br>
</p>
<img src="{{ asset('/home/fuwu') }}/149325493379474178.jpg" class="standard-img">
<p class="standard-notes">* 注：各商家所售商品在遵循猫猫优品商品分级标准的基础上有不同的细分标准</p>
</div>
</div>
<!-- 分级标准 代码结束 -->
<!--配送说明-->
<!-- 配送说明 代码开始 -->
<div class="pink-bg clearfix">
<div class="content-box clearfix">
<h2>猫猫二手优品的配送服务说明</h2>
<img src="{{ asset('/home/fuwu') }}/149325495490894583.png" class="express-img">
</div>
</div>
<!-- 配送说明 代码结束 -->
<!--常见问题-->
<!-- 常见问题 代码开始 -->
<div class="white-bg clearfix">
<div class="content-box clearfix">
<h2>常见问题</h2>
<ul class="common-problem">
<li>
<p class="common-problem-one"><span>Q：</span>猫猫二手优品的商品质量怎么保障？</p>
<p class="common-problem-two"><span>A：</span>每件商品都经过质检工程师深度检测，且提供7天无理由退货和180天整机质保服务（其中电池质保90天）</p>
</li>
<li>
<p class="common-problem-one"><span>Q：</span>用户收货后发生质量问题怎么办？</p>
<p class="common-problem-two"><span>A：</span>用户购买物品后7天内对物品不满意或发生质量问题可以申请退货服务；因物品质量问题退货产生的运费由我们来承担； 非质量问题退货需由用户承担寄回运费。</p>
</li>
<li>
<p class="common-problem-one"><span>Q：</span>二手优品售卖的商品是否会有数据残留？</p>
<p class="common-problem-two"><span>A：</span>手机原主人的注册信息及私人数据都会通过专业工具粉碎，并彻底还原到出厂设置，确保和新手机状态一致，可任意绑 定ID账号及导入个人数据。</p>
</li>
<li>
<p class="common-problem-one"><span>Q：</span>关于产品包装及配件？</p>
<p class="common-problem-two"><span>A：</span>猫猫二手优品均使用定制包装，赠送非原装配件，部分标注官翻或全新未激活的商品以特殊说明为准。</p>
</li>
<li>
<p class="common-problem-one"><span>Q：</span>购买的二手商品是否有正规发票？</p>
<p class="common-problem-two"><span>A：</span>猫猫二手优品均提供正规发票，可开具普通发票和普通增值税发票。</p>
</li>
</ul>
</div>
</div>
<!-- 常见问题 代码结束 -->
<!--合作商家-->
<!-- 合作商家 代码开始 -->
<div class="black-bg clearfix">
<div class="content-box clearfix">
<h2>合作品质商家</h2>

</div>
</div>
<!-- 合作商家 代码结束 -->

<script>
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('2 a;5(!a)a={};5(!a.D)a.D={};(4(){2 1C=/^\\w*?.l.x$/,1o=c.I.2n,W=(("1c:"==c.I.W)?"1c://":"1O://"),18=1D(),b="|",1b=p.1d==p.1Y?I.C:p.1d.I.C,16=j(1u(1b));4 T(9){2 7=9.7?j(9.7):"7 E",u=9.u?j(9.u):"u E",d=k 1S(),1a=(V(9,d),d)?j(d.1R("").1B(/\\s|\\|/1Q,"")):"1P E",h=(h=c.17("1T"))?h.z:"",1l=u+b+7+b+1a,B=(B=c.17("1X"))?B.z:"",1k=W+18+"/1Z.1M",10=1i(),Z="Z";1t(Z,10,\'/\',"","");2 1f=15("1I"),1g=1F 19=="1E"?19.1e:"1N 1J 1L 1e",1j=10+b+1f+b+1l+b+16,Y=9.C?9.C:\'\',M=(Y?1q(Y):\'-\'),1h=1k+"?"+"2f="+1j+"&"+"2j="+B+"&"+"h="+h+"&"+"2k="+1g+\'&\'+\'2c=\'+M;11(1h)}4 1i(){2 13=k X(),m=1n.23(21*1n.26()),12=13.P().2b().2a(m);6 12}4 15(7){2 Q=c.1p.14("; ");1z(2 i=0;i<Q.A;i++){2 R=Q[i].14("=");5(R[0]==7)6 1K(R[1])}}4 11(1m){2 n="25"+(k X()).P();2 i=p[n]=k 2d();i.2m=(i.1V=4(){p[n]=F});i.1U=1m+"&2e="+n;i=F}4 1D(){5(1C.24(1o)){6"D.l.1A/a"}y{6"22.l.1A/a"}}4 1s(){6 c.g}4 1t(7,z,K,L,g){2 e=7+"="+28(z);5(L!=""){2 G=k X();G.29(G.P()+L);e+=";L="+G.27()}5(K!=""){e+=";K="+K}2 O=1s();5(O.q(".l.x")!=-1){e+=";g=.l.x"}y 5(O.q(".1r.x")!=-1){e+=";g=.1r.x"}y{e+=";g="+g}c.1p=e}4 1q(r){2 N=\'-\';5(!t(r)){N=1y(r,\'M\',\'&\')}6 N}4 1u(8){5(8.A>2i){8=8.1x(0,2g)}2h(8.q(b)!=-1){8=8.1B(b,"--")}6 8}4 V(n,d){5(n.1v==3){d.2l(n.20)}y 5(n.1v==1){1z(2 m=n.1H;m!=F;m=m.1G){V(m,d)}}}4 j(s){6 s!=F?1W(s):""}4 1y(f,J,S){2 U="-",v;5(!t(f)&&!t(J)&&!t(S)){v=f.q(J);5(v>-1){2 H=f.q(S,v);5(H<0){H=f.A}U=f.1x(v+J.A+1,H)}}6 U}4 t(o){6(E==o||\'\'==o||\'-\'==o)}2 1w=a.D;1w.T=T})();',62,148,'||var||function|if|return|name|urlOrTitle|data|sa|_tag|document|_strings|str|map|domain|_type||_encode|new|suning||||window|indexOf|||IsEmpty|id|idx||com|else|value|length|_errorCode|href|click|undefined|null|date|endIdx|location|key|path|expires|sid|SID|dm|getTime|arrStr|temp|separator|sendDatasIndex|result|_getString|protocol|Date|aHref|_snck|oId|httpGifSendIndex|onlyId|now|split|getCookieIndex|_shortToUrl|getElementById|server|sn|_text|_toUrl|https|top|cityId|pvId|_cityId|url|getOnlyIdIndex|cDatas|clickUrl|Datas|strURL|Math|hostName|cookie|GetSID|cnsuning|_getDomain|_addCookie4Index|_cutUrlToShort|nodeType|_click|substring|Pick|for|cn|replace|sn_prd_reg|getServer|object|typeof|nextSibling|firstChild|_snmp|not|unescape|get|gif|can|http|text|ig|join|Array|resourceType|src|onerror|encodeURIComponent|errorCode|self|ajaxClick|nodeValue|100000|clicksit|round|test|log_|random|toGMTString|escape|setTime|concat|toString|_sid|Image|iId|_snmk|300|while|301|_snme|_cId|push|onload|hostname'.split('|'),0,{}))
$("a[name^=PcYoupin_none_],h5[name^=PcYoupin_none_],h4[name^=PcYoupin_none_],h3[name^=PcYoupin_none_],h2[name^=PcYoupin_none_],h1[name^=PcYoupin_none_],li[name^=PcYoupin_none_],div[name^=PcYoupin_none_],label[name^=PcYoupin_none_],input[name^=PcYoupin_none_],span[name^=PcYoupin_none_]").live("click",function(){
sa.click.sendDatasIndex(this);
});
</script>


</body></html>
@endsection