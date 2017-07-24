
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
	                        	<span>{{ session('address') }}</span>
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
		{{ $data->appends($request)->links('vendor.pagination. -default', ["max" => $max]) }}
	</div>
	<div id="infocont" class="infocont">

		共 <span style="color: red"><b>{{ $obj }}</b></span> 条信息，
		<a href="#" class="pubbtn" rel="nofollow">马上发布一条北京二手台式机/配件信息&raquo;</a>
	</div>
</div>
