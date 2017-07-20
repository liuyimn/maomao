@extends('home.layout')

@section('content')
<link href="{{ asset('/home/shopcss/public.css') }}" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/home/shopcss/buyConfirm.css') }}" />


    
     <!--  导航条    start-->
 	<div class="yHeader">
		<div class="shop_Nav">
			<div class="pullDown">
				<h2 class="pullDownTitle"><i></i>全部商品分类</h2>
			</div>

			<ul class="Menu_box">
				<li><a href="{{ url('/') }}" class="yMenua">首页</a></li>
			</ul>
            <div class="fr r_icon"><i class="i01"></i><span>30天退货</span><i class="i02"></i><span>满59包邮</span></div>
		</div>
 	</div>
	<!--  导航条 end-->
    
    <div class="banner_red_top"></div>  
    
    
	 <!--订单提交body部分开始-->  
	<div class="border_top_cart">

	<div class="container payment-con">
		<!-- <form  target="_blank" action="#" id="pay-form" method="post"> -->
			<div class="order-info">
				<div class="msg">
					<h3>您的订单已提交成功！付款咯～</h3>
					<p></p>
					<p class="post-date">成功付款后，7天发货</p>
				</div>
				<div class="info">
					<p>
						金额：<span class="pay-total">{{ $stmt['page'] }}元</span>
					</p>
					<p>订单：{{ $stmt['num'] }}</p>
					<p>
						配送：{{ $stmt['address'] }}
					</p>
				</div>
				<div class="icon-box">
					<i class="iconfont"><img src="{{ url('/home/images/yes_ok.png') }}"></i>
				</div>
			</div>
				
			<div class="xm-plain-box">
				<!-- 选择支付方式 -->
				<div class="box-hd bank-title clearfix">
					<div id="titleWrap" class="title-wrap">
						<h2 class="title">选择支付方式</h2>
						<h2 class="title hide " >你还需要继续支付 <em>{{ $stmt['page'] }}</em> 元</h2>
						<span class="tip-tag"></span>
					</div>
				</div>
				<div class="box-bd" id="bankList">
					<div class="payment-bd">
						<form name="ck">
							<dl class="clearfix payment-box" >
								<dt >
									<strong style="display:none;">支付平台</strong>
									<p style="display:none;">手机等大额支付推荐使用支付宝快捷支付</p>
								</dt>
								<dd>
									<fieldset id="test4-input-input_tab1-input_tab2" style=" border:none;">
										<ul class="payment-list clearfix" >
											<li><input style="display:none;" class="input_tab1" name="myradio" id="r1" type="radio" checked="checked"/><label for="r1" ><img style="display:none;" src="{{ url('/home/images/xhw.png') }}" alt=""/></label></label></li>
											<li><input style="display:none;" class="input_tab2" name="myradio" id="r2" type="radio" /><label for="r2" ><img style="display:none;" src="{{ url('/home/images/zfb.png') }}" alt=""/></label></li>
											<li><input style="display:none;" class="input_tab2" name="myradio" id="r2" type="radio" /><label for="r2" ><img style="display:none;" src="{{ url('/home/images/yck.png') }}" alt=""/></label></li>
											<li><input style="display:none;" class="input_tab2" name="myradio" id="r2" type="radio" /><label for="r2" ><img style="display:none;" src="{{ url('/home/images/zxzf.png') }}" alt=""/></label></li>
										</ul>
										<div>
											<div id="test4_1">
												<ul class="payment-list clearfix">
													<div class="xhw">
													</div>
												</ul>
											</div>
											<div  id="test4_2" style="display:none;">
												
											</div>
											<div  id="test4_3" style="display:none;">
												
											</div>
											<div  id="test4_4" style="display:none;">
												
											</div>
										</div>
									</fieldset>
								</dd>
							</dl>
						</form>

					</div>
				</div>
				<div class="box-ft clearfix">
					<a href="{{ url('/') }}" class="btn btn-lineDakeLight" style="background-color: orange; width: 150px; height: 40px; line-height: 40px; font-size: 18px;">完成订单</a>
					<span class="tip"></span>
				</div>
			</div>
		<!-- </form>   -->
	</div>
	<!-- 支付弹框 -->
	<div style="display:none;" class="modal hide to-pay-tip" id="toPayTip">
		<div class="modal-header">
			<span class="close" id="toPayTipClose">
				<i class="iconfont">&#xe617;</i>
			</span>
			<h3>正在支付...</h3>
		</div>
		<div class="modal-body">
			<div class="pay-tip clearfix">
				<div class="fail">
					<h4>如果支付失败...</h4>
					<p>额度问题，推荐<a href="#" id="alipayTrigger">支付宝快捷支付 &gt;</a></p>
					<p>其他问题，查看<a href="#">支付常见问题 &gt;</a></p>
				</div>
				<div class="success">
					<h4>支付成功了</h4>
					<p>立即查看<a href="#" target="_blank">订单详情 &gt;</a></p>
				</div>
			</div>
		</div>
	</div>
	
	<!-- 余额支付弹框 -->
	<div style="display:none;" class="modal hide  balance-pay" id="balancePay">
		<div class="modal-body">
			<h3>账户余额支付：<span class="num"><em id="useCashAccountPayLeft">0.00</em>元</span></h3>
			<p id="checkCodeTip">短信验证码已下发至您的手机<span class="num"></span></p>
			<input type="text" name="verifycode" id="verifycode" class="input" placeholder="请输入验证码"> <span class="send-again" id="sendAgain">重新发送<em></em></span>
			<p><input type="button" value="确认支付" class="btn btn-primary" id="toPay">
			<div class="select-other">
				<p><span id="bankName"></span> <span class="num">49.00元</span></p>
				
			</div>
			<a href="javascript:;" id="chooseOther">选择其他方式支付&gt;</a>
		</div>
	</div>

    <script src="js/base.min.js"></script>

	<script type="text/javascript" src="js/buyConfirm.js"></script>
   
	</div>

 <!--订单提交body部分结束-->
@endsection
