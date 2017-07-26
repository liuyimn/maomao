@extends('home.layout')

@section('content')

	<script type="text/javascript" src="{{asset('/home/js/createelement-lte-ie8.js')}}"></script>
	<script type="text/javascript" src="{{asset('/home/js/require_jquery_load.js')}}"></script>
	<script type="text/javascript" src='{{asset("/home/js/boot_sale_v20170703195205.js")}}'  ></script>
	<script src="{{asset('/home/js/entry.js')}}"></script>

	<div class="nav">
		<a href="/">北京大脸猫</a>
		<a href='/sale.shtml'>北京二手市场</a>
		<a href='/diannao/'>北京二手台式机/配件</a>
	</div>
	<section id="selection">
		<div>
			<form action="{{ url('/home/list/show') }}">
				<dl class="secitem clearfix" >
					<dt>价格 ：</dt>
					<dd zwname="价格" zwnameid="5621">
						<a name='b_link' class='b_link' href="#">不限</a>
						<a name='b_link' class='b_link' href="#">1000-2000</a>
						<a name='b_link' class='b_link' href="#">2000-3000</a>
						<a name='b_link' class='b_link' href="#">3000-5000</a>
					</dd>
				</dl>
			</form>

			<dl class="secitem secitem_area clearfix">
				<dt>区域 ：</dt>
				<dd zwnameid="quyu" zwname="区域" >
					<a href='#' class='b_address' data-finalurl='#'>不限</a>
					<a href='#' class='b_address' data-finalurl='#'>天津市</a>
					<a href='#' class='b_address' data-finalurl="#">石家庄市</a>
					<a href='#' class='b_address' data-finalurl="#">内蒙古自治区</a>
					<a href='#' class='b_address' data-finalurl="#">沈阳市</a>
					<a href='#' class='b_address' data-finalurl="#">白城市</a>
				</dd>
			</dl>
		</div>
	</section>

	<div id="main">
		<div class="mainleft" id="infolist">
			<!-- 个人商家回收选项卡 -->
			<div class="infocon jzcon" id="jzcon">
				<table class="tbimg" cellspacing="0" cellpadding="0" id="jingzhun">
					<colgroup>
						<col class="w130"></col>
					</colgroup>
				</table>
			</div>
			<div class="infocon zhiding">
				<table class="tbimg" cellspacing="0" cellpadding="0" id="zhiding">
					<colgroup id="col">
						<col class="w130"></col>
			            <col class="w550"></col>
			            <col class="w100"></col>
			            <col class="w100"></col>
			            <col class="w100"></col>
					</colgroup>
					<tbody id="tbody">
						@foreach($data as $key => $val)
							<tr class="zzinfo" logr="z_2_22418388680711_28541506662583_1_2_0" _pos="1" sortid="552662188">
			                    <td class="img">
			                        <a class="numa" href="{{ url('/home/details') }}/{{ $val->id }}" rel="nofollow">
			                            <img width="100" src="{{ url('/uploads/shop') }}/{{ $val->pic }}" alt="卖家商品"/>
			                        </a>
			                    </td>
			                    <td class="t">
			                        <a href="{{ url('/home/details') }}/{{ $val->id }}" class="t" rel="nofollow">{{ $val->name }}<span class="zhiding_icon">顶</span></a>
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
			                        	<span>{{ mb_substr($val->address, 0, 6).'...' }}</span>
			                        	&nbsp;
			                        	<a href="{{ url('/home/list/create') }}/{{ $val->id }}"><span>添加到购物车</span></a>
			                        	&nbsp;
			                        	<a class="numa" href="{{ url('/home/details') }}/{{ $val->id }}">查看详细信息</a>
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
				<a href="#" class="pubbtn" rel="nofollow">马上发布一条北京二手台式机/配件信息&raquo;</a>
			</div>
		</div>

		<div class="mainright">
			<div id="brand_tcrm"></div>
			<div id="rightframe"></div>
			<div class="cb"></div>
			<div class="topinfos">
				<ul>
					<li><span class="topprice"><b class='pri'>拍卖热销</b></span></li>
					@foreach($res as $k => $v)
					<li>
						<a href="{{ url('/home/auct/details') }}/{{ $v->id }}">
							<div class="imgcon">
								<img src="{{ url('/uploads/auction') }}/{{ $v->pic }}" alt="精选推荐" >
							</div>
							<div class="toptitle">
								{{ $v->name }}
							</div>	
							<div class="toppricebiao">
								<span>￥<span class="topprice"><b class='pri'>{{ $v->newpage }}</b> </span></span>
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

	<script type="text/javascript">

		//遍历价钱区间
		$('.b_link').each(function(){

			//当前选中区间
			$(this).click(function(){

				//获取到价钱值
				var page = $(this).html();

				//get请求ajax
				$.get('/home/list/research', {page:page}, function(data){

					$('#infolist').empty();

					$('#infolist').append(data);

				},'html');

			});

		});


		$('.b_address').each(function(){

			$(this).click(function(){

				var address = $(this).html();

				$.get('/home/list/search', {address:address}, function(address){

					$('#infolist').empty();

					$('#infolist').append(address);

				}, 'html');

			});

		});


	</script>

@endsection