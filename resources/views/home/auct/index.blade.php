@extends('home.layout')

@section('content')	

		<div class="nav">
			<a href="#">北京大脸猫</a>
			<a href='#'>大脸猫二手市场</a>
			<a href='#'>大脸猫二手台式机/配件</a>
		</div>

		<div id="main">

			<div class="mainleft" id="infolist">
				<!-- 个人商家回收选项卡 -->
				<div class="infocon jzcon" id="jzcon">
					<table class="tbimg" cellspacing="0" cellpadding="0" id="jingzhun">
						<colgroup>
							<col class="w130"><span style="font-size: 24px; color: red;">商品秒杀中,仅限一天哟~</span></col>
						</colgroup>
					</table>
				</div>
				<div class="infocon zhiding">
					<table class="tbimg" cellspacing="0" cellpadding="0" id="zhiding">
						<colgroup>
							<col class="w130"></col>
				            <col class="w550"></col>
				            <col class="w100"></col>
				            <col class="w100"></col>
				            <col class="w100"></col>
						</colgroup>
						<tbody>
							@foreach($data as $key => $val)
								<tr class="zzinfo" logr="z_2_22418388680711_28541506662583_1_2_0" _pos="1" sortid="552662188">
				                    <td class="img">
				                        <a href="{{ url('/home/auct/details')}}/{{ $val->id }}"  target="_blank" rel="nofollow">
				                            <img width="100" src="{{ url('/uploads/auction') }}/{{ $val->pic }}" alt="办公、游戏"/>
				                        </a>
				                    </td>
				                    <td class="t">
				                        <a href="{{ url('/home/auct/details')}}/{{ $val->id }}"  target="_blank" class="t" rel="nofollow">{{ $val->name }}<span class="zhiding_icon">顶</span></a>
				                        <i class="clear"></i>
				                        <span  class="pricebiao">
				                        	<span class="price">原价</span>￥<span class="price">{{ $val->oldpage}}</span>
				                        	&nbsp;&nbsp;&nbsp;&nbsp;
				                        	<span class="price">现价</span>￥<span class="price">{{ $val->newpage}}</span>
				                        </span>
				                        <i class="clear"></i>
				                        <span class="desc"></span>
				                        <span class="zz_tag">
				                        	<span class="tag">分期付款</span>
										</span>
				                        <i class="clear"></i>
				                        <span class="fl">
				                        	<span>北京</span>
				                        	&nbsp;
				                        	<a href="{{ url('/home/num/my') }}/{{ $val->id }}">我要购买</a>
				                        	<span  class="pricebiao">
				                        	</span>
				                        </span>
				                        <i class="clear"></i>
				                    </td>
				                    <td></td>
				                    <td class="tc">
				                        <div class="qq_attest">
				                            <p class="img_attest">
				                            <img src="{{ url('/uploads/user') }}/{{ $val->photo }}">
				                            </p>
				                            <p class="name_add">{{ $val->nickname }}</p>
				                        </div>
				                    </td>
				                    <td></td>
					            </tr>
							@endforeach
						</tbody>
					</table>
				</div>
							    	
				<iframe src="about:blank" id="searchResult" name="searchResult" frameBorder="0" width="100%" scrolling="no" height="40"></iframe>
				<div class="pager">
					{{ $data->appends($request)->links('vendor.pagination.simple-default', ["max" => $max]) }}
				</div>
				<div id="infocont" class="infocont">
						共 <span style="color: red"><b>{{ $obj }}</b></span> 条信息，
						<a href="#" target="_blank" class="pubbtn" rel="nofollow">马上发布一条大脸猫二手台式机/配件信息&raquo;</a>
				</div>
			</div>

			<div class="mainright">
				<div id="brand_tcrm"></div>
				<div id="rightframe"></div>
				<div class="cb"></div>
				<div class="topinfos">
					<ul>
						<li><span class="topprice"><b class='pri'>畅品热销</b></span></li>
						
						@foreach($res as $v)
						<li logr="q_2_48459556635405_30570495766351_4_2_0" _pos="10" sortid="552175998">
							<a  href=""   target="_blank" >
								<div class="imgcon">
									<img src="{{ url('/uploads/shop') }}/{{ $v->pic }}" alt="" >
								</div>
								<div class="toptitle">
								{{ $v->connect }}
								</div>	
								<div class="toppricebiao">
									<span>￥
										<span class="topprice">
										<b class='pri'>{{ $v->newpage }}</b> </span>
									</span>
								</div>	
							</a>
						</li>
						@endforeach

					</ul>
				</div>
			</div>

			<div class="clear">
			</div>
		</div>

		<div id="direct_ad_bottom"></div>

		<script src="{{ asset('/home/js/entry.js') }}"></script>

@endsection