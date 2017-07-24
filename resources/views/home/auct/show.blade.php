<!DOCTYPE html>
<html>
	<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <title>大脸猫 - {{ $title }}</title>
	  <link rel="stylesheet" type="text/css" href='{{asset("/home/css/zzdetails_pc_v20170522210751.css") }}' media="all">
	  <style type="text/css">
        #con
        {
            width: 300px;
            height: 280px;
            margin: 0 auto;
            position: relative;
        }
        #small
        {
            position: absolute;
            width: 100%;
            height: 280px;
        }
        #big
        {
            width: 300px;
            height: 200px;
            position: absolute;
            margin-left: 350px;
            top: 160px;
            overflow: hidden;
        }
        #move
        {
            position: absolute;
            left: 0;
            top:0;
            background: url('../../../../home/images/bg.png');
        }

        #bigImg
        {
            position: absolute;
            display: none;
        }

        #uid
        {
            position: absolute;
            width: 200px;
            height: 66px;
            border: 1px solid #ccc;
            top: 240px;
            left:20px;
        }
    </style>
	</head>
	<body>
	   	<div id="topbar"></div>
	  	<div class="header">
		    <div class="header_top wrapper clearfix">
				<a class="header_top_logo" href="{{ url('/home/index') }}" title="大脸猫二手市场">
					<img src="{{asset('/home/Picture/logo.png') }}" style="width: 100px; height: 100px; margin-top: -3px;margin-left: 5px;" alt="大脸猫二手市场">
					<div class="header_top_intro">
						<div class="intro_top">专业的二手交易平台<i class="line"></i></div>
						<div class="intro_btm">大脸猫二手全新升，新品牌，新服务</div>
					</div>
				</a>
		      	<span class="zzbiaozhi clearfix"></span>
		    </div>
		</div>

		<div class="content">

			<div class="box wrapper clearfix">
				<div class="box_left">

					<div id="nav" class="nav">
						<div class="breadCrumb f12">
							<span>
								<a href="{{ url('/') }}">首页</a>
							</span>
							<span class="crb_i">
								<a href='#'>大脸猫市场</a>
							</span>
						</div>
					</div>    
					<div class="info_lubotu clearfix">
	
						<div class="box_left_top">
							<h1 class="info_titile">{{ $data->name }}</h1>
						</div>

						<div class="banner">
							<div id="con" class="g_img">
								<span data-adjust="adjust">
									<div id="small">
										<img id="smallImg" style="width: 100%" src="{{ url('/uploads/auction') }}/{{ $data->pic }}" alt="商品图片"/>
										<div id="move"></div>
									</div>
								</span>
							</div>

							<div class="g_thumb">
								<span id="img_scrollLeft">
									<a href="javascript:void(0)" class="icon_left"></a>
								</span>
								<span id="img_scrollRight">
									<a href="javascript:void(0)" class="icon_right"></a>
								</span>

								<div class="g_thumb_main">
									<ul id="img_smalls">
										<li data-adjust="adjust" class="hover">
											<img src="{{ url('/uploads/auction') }}/{{ $data->pic }}" width="100%" />
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div id="big">
				            <img id="bigImg" style="width: 200%" src="{{ url('/uploads/auction') }}/{{ $data->pic }}">
				        </div>

						<div class="info_massege left">

							<div class="price_li">
								<span class="price_now">原价：<i>{{ $data->oldpage }}</i>元</span>
								<span class="price_now">现价：<i>{{ $data->newpage }}</i>元</span>
							</div>

							<div class="palce_li">
								<span>区域：<i>北京昌平区</i></span>
							</div>

							<div class="biaoqian_li">
								<span style="width: 150px;">{{ $data->connect }}</span>
							</div>

							<div class="button_li">
								<span class="talk_button download_button">联系卖家</span>
								<a href="{{ url('/home/num/my') }}/{{ $data->id }}"><span class="buy_button download_button">我要购买</span></a>
							</div>

							<div class="want_li">
								<span class="want_left">
									<img src="{{asset('/home/Picture/want.png')}}">
									收藏
								</span>
								<span class="want_right">
									<span class="want_no">宝贝还没有被收藏，快来抢沙发</span>
								</span>
							</div>

						</div>

					</div>    

					<div class="info_baby">
					</div>

					<div class="ad_detail_middle"></div>

					<div class="info_liuyan clearfix">

						<div class="box_title clearfix liuyan_title">
							<h3 class="box_title_h3 left">宝贝留言（<i>0</i>）</h3>
						</div>

						<div class="liuyan_ewm">
							<img style="margin-top: -8px; margin-right: -10px;" src="{{asset('/home/Picture/9b8a52486f214173a1935e022676e60d.gif')}}">
						</div>
					</div>

					<div class="info_baby">
						<h3 class="box_title">宝贝图片</h3>

						<div class="boby_pic">
							<img style="width: 100%" src="{{ url('/uploads/auction') }}/{{ $data->pic }}" >
						</div>

					</div>

				</div>

				<div class="box_right">

					<div class="personal">

						<div class="personal_jieshao">
							<ul class="personal_biaoqian clearfix"></ul>
							<div class="personal_touxiang" data-adjust="adjust">
								<img src="{{ url('/uploads/user') }}/{{ $user->photo }}" alt="">
							</div>
							
							<p class="personal_name">{{ $user->nickname }}</p>
						</div>

						<div class="personal_salebaby">

							<h3 class="person_title">她的宝贝(3)</h3>

							<ul class="salebaby_list">
								<li style="float: left;">
									<a href="{{ url('/home/auct/details') }}/{{ $user->id }}" target="_blank">
										<div data-adjust="adjust" class="plist_img">
											<img width="100%" src="{{ url('/uploads/auction') }}/{{ $user->pic }}" />
										</div>
										<span class="plist_price"><i>{{ $user->newpage }}</i>元</span>
									</a>
								</li>
							</ul>                                                                  
						</div>
					</div>

					<div class="personal tuijian_div">
						<div class="personal_tuijian">
							<h3 class="box_title">精选推荐</h3>
							<ul class="personal_list">

							@foreach($jx as $key => $value)
								<li class="clearfix">
									<a href="{{ url('/home/details') }}/{{ $value->id }}" target="_blank">
										<dl class="clearfix">
											<dt data-adjust="adjust">
												<img width="100%" src='{{ url('/uploads/shop') }}/{{ $value->pic }}' />      
											</dt>
											<dd class="info_title">{{ $value->name }}</dd>
											<dd class="info_price"><i>{{ $value->newpage }}</i>元</dd>
										</dl>
									</a>
								</li>
							@endforeach
							</ul>
						</div>
					</div>
	
					<div class="personal tuijian_div">
						<div class="personal_tuijian">
							<h3 class="box_title">吐血大推荐</h3>
							<ul class="personal_list">

							@foreach($ar as $key => $val)
								<li class="clearfix">
									<dl class="clearfix">
										<dt data-adjust="adjust">
											<img width="100%" src="{{ url('/uploads/advert') }}/{{ $val->pic }}" />      
										</dt>
										<dd class="info_title"><b style="font-size: 16px; color: red;">标题:</b>{{ $val->title }}</dd>
										<i>{{ mb_substr($val->connect, 0, 8).'...' }}</i>
									</dl>
								</li>
							@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>        

		<div class="personal_tan">
		</div>        

		<div class="footer_footer">
		    <p>
			    <span>北京易第优教育咨询有限公司</span>
			    <span> 电话: 010-8888888 </span> 
			    <span>日常联系地址: 北京市昌平区回龙观育荣教育园区</span>
			    <span>联系我们: kefu@mao.com</span>
			    <span></span>
		    </p>
		    <p>
			    <span>版权所有© mao.com</span>
			    <span>京公网安备110105000809号</span>
			    <span>京ICP证060405</span>&nbsp;
			    <span>乙测资字11018014</span>
		    </p>
		</div>        

		<div id="gotop" class="icon_png">
			<a href="#" class="icon-btn-top"></a>
		</div>    

		<script type="text/javascript" src='{{asset("home/js/jquery.qrcode.min_v20151221160205.js") }}'></script>
		<script src="{{asset('home/js/config.js') }}"></script>
	    <script type="text/javascript" src="{{asset('home/js/referrer4.js') }}"></script>
	    <script type="text/javascript" src="{{asset('home/js/jquery-1.11.0.min.js') }}"></script>
	
		<script type="text/javascript">

	        // 获取元素。
	        var con = document.getElementById('con');
	        var small = document.getElementById('small');
	        var big = document.getElementById('big');
	        var bigImg = document.getElementById('bigImg');
	        var move = document.getElementById('move');
	        var smallImg = document.getElementById('smallImg');

	        // 全局变量。
	        var mw = 0;
	        var mh = 0;
	        var smallW = 0;
	        var smallH = 0;
	        var bigImgW = 0;
	        var bigImgH = 0;
	        
	        // 添加事件。
	        small.onmouseover = function()
	        {
	            bigImg.style.display = 'block';
	            move.style.display = 'block';

	            // 获取 big 的宽度。
	            var bigW = big.offsetWidth;
	            var bigH = big.offsetHeight;
	            // 获取 大图片的 宽度和高度。
	            bigImgW = bigImg.offsetWidth;
	            bigImgH = bigImg.offsetHeight;
	            // 获取 samll 的宽度和高度。
	            smallW = small.offsetWidth;
	            smallH = small.offsetHeight;

	            // 计算比例.
	            var wp = bigW/bigImgW;
	            var hp = bigH/bigImgH;

	            // 计算 背景的宽度和高度。
	            mw = wp * smallW;
	            mh = hp * smallH;

	            // 设置 move 的宽度和高度。
	            move.style.width = mw + 'px';
	            move.style.height = mh + 'px';

	        }

	        // 移动事件。
	        small.onmousemove = function(e)
	        {
	            // 获取 con 的left
	            var conL = con.offsetLeft;
	            var conT = con.offsetTop;

	            // 获取 small 的left
	            var smallL = small.offsetLeft;
	            var smallT = small.offsetTop;

	            // 获取鼠标的 距离。
	            var mouseL = e.pageX;
	            var mouseT = e.pageY;

	            // 计算　move 的left
	            var moveL = mouseL - conL - smallL - mw/2;
	            var moveT = mouseT - conT - smallT - mh/2;

	            // 判断
	            if(moveL <= 0)
	            {
	                moveL = 0;
	            }

	            if(moveL >= smallW - mw)
	            {
	                moveL = smallW - mw;
	            }

	            if(moveT <= 0)
	            {
	                moveT = 0;
	            }

	            if(moveT >= smallH - mh)
	            {
	                moveT = smallH - mh;
	            }

	            // 设置
	            move.style.left = moveL + 'px';
	            move.style.top = moveT + 'px';

	            // 计算大图比例。
	            var bigImgWP = moveL / smallW;
	            var bigImgHP = moveT / smallH;

	            // 计算大图移动的距离。
	            var bigImgL = bigImgW * bigImgWP;
	            var bigImgT = bigImgH * bigImgHP;

	            // 设置大图的 left top
	            bigImg.style.left = - bigImgL + 'px';
	            bigImg.style.top = - bigImgT + 'px';

	        }

	        // 移出事件。
	        small.onmouseout = function()
	        {
	            bigImg.style.display = 'none';
	            move.style.display = 'none';
	        }

	        // 获取　图片。
	        var imgs = document.getElementsByClassName('list');

	        // 循环
	        for(var i = 0; i < imgs.length; i ++)
	        {
	            imgs[i].onmouseover = function()
	            {
	                // 获取当前　src
	                var src =  this.src;
	                // 设置小图与大图的　src
	                smallImg.src = src;
	                bigImg.src = src;
	            }
	        }
	    </script>

	</body>
</html>
