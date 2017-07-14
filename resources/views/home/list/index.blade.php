<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="mobile-agent" content="format=xhtml; url=http://m.58.com/bj/diannao/?zz=zz">
		<meta http-equiv="mobile-agent" content="format=html5; url=http://m.58.com/bj/diannao/?zz=zz">
		<meta http-equiv="mobile-agent" content="format=wml; url=http://m.58.com/bj/diannao/?zz=zz">
		<title>大脸猫 - {{ $title }}</title>
		<meta name="description" content=""/>
		<meta name="keywords" content=""/>
		<link type="text/css" rel="stylesheet" href='{{asset("/home/css/base_v20160530193544.css")}}' media="all">
		<link rel="stylesheet" type="text/css" href='{{asset("/home/css/listzz_v20170704194231.css")}}' media="all">
		<script type="text/javascript">
		</script>
		<script type="text/javascript" src="{{asset('/home/js/createelement-lte-ie8.js')}}"></script>
		<script type="text/javascript" src="{{asset('/home/js/require_jquery_load.js')}}"></script>
		<script type="text/javascript" src='{{asset("/home/js/boot_sale_v20170703195205.js")}}'  ></script>
		<script src="{{asset('/home/js/entry.js')}}"></script>
	</head>
	<body>
		<div id="topbar"></div>
		<header id="header">
			<div id="brand_list_top_banner"></div>
			<div class="head">
				<a rel="nofollow" class="gotopost"><i></i>免费发布信息</a>
					<div class="zz_search" id="SearchForm" >
						<form id="search_loc" action="{{ url('/home/list') }}" method="get">
							<input type="submit" id="searchbtn1" class="search_on" value="" >
							<input class="but-wd" maxlength="40" id="keyword1" name="keywords" placeholder="请输入搜索关键字" >
						</form>
					</div>
				<div class="logo"></div>
			</div>
		</header>

		<div class="nav">
			<a href="/">北京大脸猫</a>
			<a href='/sale.shtml'>北京二手市场</a>
			<a href='/diannao/'>北京二手台式机/配件</a>
		</div>
		<section id="selection">
			<div>
				<dl class="secitem clearfix" >
					<dt>类别 ：</dt>
					<dd zwname="类别" zwnameid="35">
						<a class='select' href="">全部</a>
						<a name='b_link' para='custom' cl='?zz=zz' href="">台式机</a>
						<a name='b_link' para='custom' cl='?zz=zz' href="">硬件</a>
					</dd>
				</dl>
				<dl class="secitem clearfix" >
					<dt>价格 ：</dt>
					<dd zwname="价格" zwnameid="5621">
						<a class='select' href="/diannao/?zz=zz" data-finalurl="/diannao/?zz=zz">全部</a>
						<a name='b_link' para='custom' cl='?zz=zz' data-finalurl="" href="">100元以下</a>
						<a name='b_link' para='custom' cl='?zz=zz' data-finalurl="" href="">100-200元</a>
						<a name='b_link' para='custom' cl='?zz=zz' data-finalurl="" href="">200-500元</a>
						<a name='b_link' para='custom' cl='?zz=zz' data-finalurl="" href="">500-1000元</a>
								
						<span class="prifilter">
							<span class="text"><input type="text" id="price_start" para="minprice" size="3" muti="1" min="0" max="999999" name="b_q" autocomplete="off"></span>
							<span class="dev"> - </span>
							<span class="text"><input class="mr5" type="text" id="price_end" para="minprice" size="3" muti="1" min="0" max="999999" name="b_q" autocomplete="off">元</span>
							<span class="btn""><input id="price_search" type="button" value="价格筛选"></span>
						</span>
					</dd>
				</dl>
				<dl class="secitem secitem_area clearfix">
					<dt>区域 ：</dt>
					<dd zwnameid="quyu" zwname="区域" >
						<a href='#' data-finalurl='#' class='select'>全国</a>
						<a href='#' data-finalurl='#' >全北京</a>
						<a href='#' data-finalurl="#">朝阳</a>
						<a href='#' data-finalurl="#">海淀</a>
						<a href='#' data-finalurl="#">东城</a>
						<a href='#' data-finalurl="#">西城</a>
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
				                        <a class="numa" href="{{ url('/home/details') }}/{{ $val->id }}" rel="nofollow">
				                            <img src="{{ url('/uploads/shop') }}/{{ $val->pic }}" alt="卖家商品"/>
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
				                        	<span>北京</span>
				                        	&nbsp;
				                        	<a class="numa" href="{{ url('/home/details') }}/{{ $val->id }}">查看详细信息</a>
				                        </span>
				                        <i class="clear"></i>
				                    </td>
				                    <td></td>
				                    <td class="tc">
				                        <div class="qq_attest">
				                            <p class="img_attest">
				                            <img src="{{ url('/uploads/userdetail') }}/{{ $val->photo }}">
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
					 <strong>
					 <span>1</span>
					 </strong>
					 <a href="/diannao/pn2/?zz=zz"><span>2</span></a>
					 <a href="/diannao/pn3/?zz=zz"><span>3</span></a>
					 <a href="/diannao/pn4/?zz=zz"><span>4</span></a>
					 <a href="/diannao/pn5/?zz=zz"><span>5</span></a>
					 <a href="/diannao/pn6/?zz=zz"><span>6</span></a>
					 <a href="/diannao/pn7/?zz=zz"><span>7</span></a>
					 <a href="/diannao/pn8/?zz=zz"><span>8</span></a>
					 <a href="/diannao/pn9/?zz=zz"><span>9</span></a>
					 <a href="/diannao/pn10/?zz=zz"><span>10</span></a>
					 <a href="/diannao/pn11/?zz=zz"><span>11</span></a>
					 <a href="/diannao/pn12/?zz=zz"><span>12</span></a>
					 <a class="next" href="/diannao/pn2/?zz=zz"><span>下一页</span></a>
				</div>
				<div id="infocont" class="infocont">
						共 <span style="color: red"><b>343106</b></span> 条信息，
						<a href="#" target="_blank" class="pubbtn" rel="nofollow">马上发布一条北京二手台式机/配件信息&raquo;</a>
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

						<li logr="q_2_48459556635405_30570495766351_4_2_0" _pos="10" sortid="552175998">
							<a  href=""   target="_blank" >
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

		<section id="links">
			<dl class="linksItem relate" id="relate">
				<dt  class="b-left" ><h2>北京台式机/配件相关信息</h2></dt>
				<dd  class="b-right" >
					<ul class="b-ul">
						<li><a href="#">i5台式机</a></li>
					</ul>
				</dd>
		 	</dl>

			<dl class="linksItem relatelink" id="relatelink">
				<dt class="b-left"><h2>北京台式机/配件品牌导航</h2></dt>
				<dd class="b-right">
					<dl id="relateSelect" class="relateSelect">
				 	 	<dt><span>LG</span></dt>
					 	<dd>
					 		<a href="#" target="_blank">二手LG note lm70</a>
					 	</dd>
				 	</dl>
				</dd>
			</dl>
		</section>


		<footer id="footer" class="footer">
			<p class="copyright">&copy; 大脸猫
				<a id="askicon" title="有问题请与大脸猫客服进行对话" rel="nofollow" href="#">帮助中心</a>
			</p>
		</footer>

		<script src="{{ asset('/home/js/entry.js') }}"></script>
	</body>
</html>