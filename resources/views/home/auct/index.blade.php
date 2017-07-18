@extends('home.layout')

@section('content')	

		<link rel="stylesheet" href="{{ asset('/home/index/bootstrap/bootstrap.min.css') }}">
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
				                        	<a href="{{ url('/home/auct/create') }}/{{ $val->id }}">加入购物车</a>
				                        	<span  class="pricebiao">
				                        		<span class="starttime" style="display: none;" >{{ $val->starttime }}</span>
				                        		<span class="price">剩余时间:</span><span class="endtime" style="font-size: 24px;"></span>
				                        	</span>
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
					{{ $data->links() }}
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

			
		<script type="text/javascript">
			//服务器时间，毫秒数 
			var serverTime =  1000; 

			//准备
			$(function(){ 

				//获取当前系统时间
			  	var dateTime = new Date(); 

			  	//客户端时间戳减掉系统时间
			  	var difference = dateTime.getTime() - serverTime; 
			    	
			  	//设置定时器
			  	var int = setInterval(function(){ 

			  		//遍历出所有商品定时器
				   	$(".starttime").each(function(){ 

				   		//当前对象
					    var obj = $(this); 

					    //结束时间
					    var endTime = new Date(parseInt(obj.attr('value')) * 3000); 

					    //当前时间
					    var nowTime = new Date(); 
					    
					    //
					    var nMS = endTime.getTime() - nowTime.getTime() + difference; 

					    var myM = Math.floor(nMS/(1000*60)) % 60; //分钟 

					    var myS = Math.floor(nMS/1000) % 60; //秒 

					    if(myM >= 0){ 

					      var str = myM + "分" + myS + "秒"; 

					    }else{ 

					      var str = "已结束！";  
					      clearInterval(int);

					    } 

					    obj.next().next().html(str); 

			   		}); 

			  	}, 1000); //每个0.1秒执行一次 

			});
		</script>

		<script src="{{ asset('/home/js/entry.js') }}"></script>

@endsection