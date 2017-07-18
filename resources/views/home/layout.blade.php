<!DOCTYPE html>
<html>
	<head>
	<meta property="wb:webmaster" content="bd14bd59a79e2a4d" />
		<meta name="360-site-verification" content="0d4ec208337c4c03706dbb76fccd784e" />
		<meta name="sogou_site_verification" content="dMhEpiNZxp"/>
	<meta name="baidu-site-verification" content="CrHL5lkDw2" />
	
	<meta name="spm-id" content="2007.1000261"/>
	<meta chaarset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<title >大脸猫二手购物网</title>
	
		
	<!-- start idle vmcommon assets 4.0-->
	<link rel="shortcut icon" type="image/x-icon" href="" />
	<!-- S GLOBAL CSS -->
	<link rel="stylesheet" href="{{ asset('/home/index/Css/global-min.css') }}">
	<!-- S GLOBAL CSS -->
	<link rel="stylesheet" href="{{ asset('/home/index/Css/cf8cdabb29cd4d268664ab04ef272c64.css') }}">
	<!-- S GLOBAL JS -->
	<script src="{{ asset('/home/index/Scripts/3e184c6718544466bc7c7def6ef3b6f8.js') }}"></script>
	<!-- E GLOBAL JS -->
	<script src="{{ asset('/home/index/Scripts/b4f74d71946043da93fca460b7edd7d3.js') }}"></script>

	<script src="{{ asset('/home/index/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/home/index/bootstrap/jquery.cxselect.min.js') }}"></script>
	<script src="{{ asset('/home/index/bootstrap/jquery-1.7.2.min.js') }}"></script>

	<link rel="stylesheet" type="text/css" href='{{asset("/home/css/listzz_v20170704194231.css")}}' >

	<style>
		.topbar-nav{float:left;height:40px;line-height:40px;overflow:hidden;_zoom:1}
		.container{position:relative}
		.sep{margin:0 0.5em;color:#b0b0b0}
		.sep{margin:0 .5em;color:#424242}
		.topbar-nav{float:left;height:40px;line-height:40px;overflow:hidden;_zoom:1}
		.site-topbar{position:relative;z-index:30;height:40px;font-size:12px;color:#b0b0b0;background:#333}
		.site-topbar a{color:#b0b0b0;text-decoration:none;}
		.site-topbar a:hover{color:#fff}
		.site-topbar .topbar-cart,.site-topbar .topbar-info{position:relative;float:right;_display:inline;height:40px}
		.site-topbar .topbar-cart{width:120px;margin-left:15px}
		.site-topbar .topbar-cart-filled .cart-mini{color:#fff;background:#ff6700}
		.site-topbar .topbar-cart-active .cart-mini{color:#ff6700;background:#fff}
		.site-topbar .topbar-info{line-height:40px}
		.site-topbar .topbar-info .link,.site-topbar .topbar-info .user,.site-topbar .topbar-info .message,.site-topbar .topbar-info .sep{float:left}
		.site-topbar .topbar-info .link{padding:0 5px;text-align:center}
		.site-topbar .topbar-info .link-order{width:70px}
		.site-topbar .topbar-info .sep{margin:0}
		.site-topbar .cart-mini{position:relative;z-index:32;display:block;height:40px;line-height:40px;text-align:center;color:#b0b0b0;background:#424242}
		.site-topbar .cart-mini i{margin-right:4px;font-size:20px;line-height:20px;vertical-align:-4px}
		.site-topbar .cart-menu{display:none;position:absolute;right:0;right:-1px \9;top:40px;z-index:31;width:316px;padding:15px 0 0;color:#424242;background:#fff;border:1px solid #e0e0e0 \9;border-top:0 \9;-webkit-box-shadow:0 2px 10px rgba(0,0,0,0.15);box-shadow:0 2px 10px rgba(0,0,0,0.15)}
		.site-mini-header .topbar-cart,.site-mini-header .topbar-info{position:relative;float:right;_display:inline;height:40px}
		.topbar-info{position:relative;float:right;_display:inline;height:40px}
		.container{width:1226px;*zoom:1;margin-right:auto;margin-left:auto}
		.container:before,.container:after{content:" ";display:table}
		.container:after{clear:both}
		.sep,.ndash{margin:0 .25em;font-family:sans-serif}
		
	</style>

			
	<!-- end idle vmcommon assets 4.0-->
		<!-- <base target="_blank"/> -->
	</head>

	<body>
	<script>
with(document)with(body)with(insertBefore(createElement("script"),firstChild))setAttribute("exparams","category=&userid=&aplus&yunid=&&trid=&asid=AQAAAAD8+V5ZjnihbAAAAABWUhZQPRIEUA==",id="tb-beacon-aplus",src=(location>"https"?"//g":"//g")+".alicdn.com/alilog/mlog/aplus_v2.js")
</script>

		<script>(function(){var a=document.body;window.screen.width>1024?a.className="w1190":a.className="w990"})();</script>
		<!-- head -->
		<div class="site-topbar">
		<div class="container">

				<div class="topbar-nav">
					<a rel="nofollow" href="#" >当前城市：@if(!session('city')){{ $city }}@else{{ session('city') }}@endif</a><span class="sep">|</span><a rel="nofollow" href="{{ url('/') }}" >大脸猫首页</a><span class="sep">|</span><a rel="nofollow" href="#" target="_blank">我的商品</a><span class="sep">|</span><a rel="nofollow" href="{{ url('home/favorite/index') }}" target="_blank">收藏夹</a><span class="sep">|</span><a rel="nofollow" href="http://game.xiaomi.com/" target="_blank">卖家中心</a><span class="sep">|</span><a rel="nofollow" href="{{ url('home/complaint/index') }}" target="_blank">联系客服</a>
				</div>
				<div class="topbar-cart" id="J_miniCartTrigger">
					<a rel="nofollow" class="cart-mini" id="J_miniCartBtn" href="{{ url('/home/details/shopcar') }}"><i class="iconfont"></i>购物车</a>
				</div>
				@if(!session('user'))
					<div class="topbar-info" id="J_userInfo">
						<a  rel="nofollow" class="link" href="{{ url('home/login/index') }}" data-needlogin="true">登录</a>
						<span class="sep">|</span>
						<a  rel="nofollow" class="link" href="{{ url('home/register/register') }}" >注册</a>
					</div>
				@else
					<div class="topbar-info" id="J_userInfo">
						<a  rel="nofollow" class="link" href="{{ url('home/user/index') }}" data-needlogin="true">{{ session('userdetail')->nickname }}</a>
						<span class="sep">|</span>
						<a  id="out" rel="nofollow" class="link" href="{{ url('/home/login/outlogin') }}" >退出</a>
					</div>
				@endif

		</div>
</div>


<!-- S GLOBAL HTML -->
<div class="idle-header-wrap" style="background-color:#fc5023;opacity:0.87;">
	<div class="idle-header" id="J_IdleHeader">

		<h1 class="idle-logo">
			<a href="{{ url('/') }}" target="_top">
				<img src="{{ asset('/home/index/Images/logoko.png') }}"  width="100px" height="100px" style="margin-top:-25px;margin-left:40px" />
			</a>
		</h1>

		<div class="idle-nav">
			<div class="idle-menu">
				<ul>
					<li class="m-home"><a href="{{ url('/') }}">首页</a></li>
					<li class="m-auction"><a href="">降降降</a></li>
				</ul>
			</div>

			<div class="idle-manage">
				<span class="idle-manage-sp">|</span>
				<ul>
					<li><a class="pub-overlay-btn" href="{{ url('/home/addshop/index') }}">发布商品</a></li>
					<li id="J_IdleLi" class="my-idle-li">
						<a class="my-idle-link" id="J_IdleLink" href="">我的发布</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="idle-search">
			<form method="get" action="{{ url('home/list/index') }}" name="keywords" target="_top">
				<input class="input-search" id="J_HeaderSearchQuery" name="keywords" type="text" value="" placeholder="搜索商品" />
				<button class="btn-search" type="submit"><i class="iconfont">&#xe602;</i><span class="search-img"></span></button>
			</form>
		</div>
	</div>
</div>

<script>
KISSY.use('widget/header5/index');
</script>


		<div class="guide5" id="J_Guide5">
			<div class="guide5-logo"><img src="{{ asset('/home/index/Picture/tb13urrhvxxxxc4xfxxatwpjfxx-93-45.png') }}" alt="" width="72.3" height="35" /></div>
			<div class="guide5-video" id="J_Video">
				<div class="video-mask"></div>
			</div>
			<div class="guide5-cover" id="J_VideoCover">
				<h2>闲鱼 闲置能换钱<a href="#nogo" id="J_BtnPlay"><i class="iconfont">&#xe603;</i></a></h2>
				<h3>全国最大的闲置交易平台</h3>
				<div class="guide5-btn">
					<a href="/" target="_self" class="btn btn-opacity btn-large" id="J_BtnEnter">进入闲鱼</a>
					<a href="/app/index" class="btn btn-yellow btn-large" id="J_BtnApp">手机版</a>
				</div>
			</div>
		</div>
@yield('content')
<!--token-->
<input id="J_tb_Token" type='hidden' name='_tb_token_' value='70b745b75e6e3'>

<div class="idle-footer" id="J_IdleFooter">
	<div class="idle-footer-info">
		<div class="idle-footer-links">
			<div class="idle-footer-links-box">
				<a href="#nogo" target="_self" class="idle-footer-link-auth">卖家实名认证</a>
				<a href="#nogo" target="_self" class="idle-footer-link-alipay">支付宝担保交易</a>
				<a href="#nogo" target="_self" class="idle-footer-link-team">专业团队支撑</a>
				<a href="http://weibo.com/taoershou" class="idle-footer-link-weibo">官方微博</a>
			</div>
		</div>
	</div>
</div>
	</div>
	</div>
</div>
<script>
	KISSY.use('widget/footer5/index');
</script>

<div align="center" id="server-num">idle010100045116.et2</div>

<div id="J_Feedback4bug" data-version-id="20038"></div>

		<script type="text/javascript">
				KISSY.use('page/index');
		</script>

		<!-- ushu abtest -->
		<script type="text/javascript" src="{{ asset('/home/index/Scripts/xwj.js') }}"></script>
		<script type="text/javascript">
									window._ap_xwj && _ap_xwj.monitor("130917-224");
						</script>

		<script type="text/javascript" src="{{ asset('/home/index/Scripts/tb-tracer-min.js') }}"></script>
		<img src="{{ asset('/home/index/Picture/t1pksfxexkxxxxxxxx-1-1.gif') }}"/>
		<script src="{{ asset('/home/index/Scripts/c.js') }}"></script>
		</body>
</html>
