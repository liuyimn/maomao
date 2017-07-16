<!DOCTYPE html>
<html>
	<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  
	  <title>大脸猫 - {{ $title }}</title>

	  <link rel="stylesheet" type="text/css" href='{{asset("/home/css/zzdetails_pc_v20170522210751.css") }}' media="all">
	  
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
								<a href="#">北京昌平区</a>
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

							<div class="gallery">
								<div class="g_img">
									<span data-adjust="adjust">
										<img id="img1" style="width: 100%" src="{{ url('/uploads/auction') }}/{{ $data->pic }}" alt="商品图片"/>
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
												<img style="width: 100%" src="{{ url('/uploads/auction') }}/{{ $data->pic }}" alt='' />
											</li>
										</ul>
									</div>
								</div>
							</div>
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
								<span style="width: 150px;">{{ $data->content }}</span>
							</div>

							<div class="button_li">
								<span class="talk_button download_button">联系卖家</span>
								<span class="buy_button download_button">我要购买</span>
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
							<img style="width: 100%" src="{{ url('/uploads/auction') }}/{{ $data->pic }}" alt="TOSHIBA 东芝500G USB3.0">
						</div>

					</div>

				</div>

				<div class="box_right">

					<div class="personal">

						<div class="personal_jieshao">
							<ul class="personal_biaoqian clearfix"></ul>
							<div class="personal_touxiang" data-adjust="adjust">
								<img src="{{ url('/uploads/userdetail') }}/{{ $user->photo }}" alt="">
							</div>
							
							<p class="personal_name">{{ $user->nickname }}</p>
							<p class="personal_chengjiu">她加入转转216天，常居上海浦东</p>
						</div>

						<div class="personal_salebaby">

							<h3 class="person_title">她的宝贝(3)</h3>

							<ul class="salebaby_list">
								<li>
									<a href="#" target="_blank">
										<div data-adjust="adjust" class="plist_img">
											<img alt="TOSHIBA 东芝500G USB3.0" src='http://pic7.58cdn.com.cn/zhuanzh/n_v2ae84e669267f4f51990e2225c888c051_115_86.jpg' />
										</div>
										<span class="plist_price"><i>800</i>元</span>
									</a>
								</li>

								<li>
									<a href="#" target="_blank">
										<div data-adjust="adjust" class="plist_img">
											<img alt="TOSHIBA 东芝500G USB3.0" src='http://pic2.58cdn.com.cn/zhuanzh/n_v1bl2lwknipzbfrw34bfta_115_86.jpg' />
										</div>
										<span class="plist_price"><i>20</i>元</span>
									</a>
								</li>
							</ul>                                                                                                                                                  </ul>
							<div class="salebaby_more">点击查看他的全部宝贝</div>
						</div>
					</div>

					<div class="personal tuijian_div">
						<div class="personal_tuijian">
							<h3 class="box_title">精选推荐</h3>
							<ul class="personal_list">

							@foreach($jx as $key => $value)
								<li class="clearfix">
									<a href="#" target="_blank">
										<dl class="clearfix">
											<dt data-adjust="adjust">
												<img alt="TOSHIBA 东芝500G USB3.0" src='http://pic8.58cdn.com.cn/zhuanzh/n_f8db46d71c754e4db085da2cb8316d50_100_75.jpg' />      
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

			$('.icon-btn-top').click(function(){
				
			});

		</script>

	</body>
</html>
