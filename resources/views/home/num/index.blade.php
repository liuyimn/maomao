@extends('home.layout')
 
@section('content')
    <link rel="stylesheet" href="{{ url('/home/css/tasp.css')}}" />
    <link href="{{ url('/home/css/orderconfirm.css')}}" rel="stylesheet" />
    <style>
        #page{width:auto;}
        #comm-header-inner,#content{width:950px;margin:auto;}
        #logo{padding-top:26px;padding-bottom:12px;}
        #header .wrap-box{margin-top:-67px;}
        #logo .logo{position:relative;overflow:hidden;display:inline-block;width:140px;height:35px;font-size:35px;line-height:35px;color:#f40;}
        #logo .logo .i{position:absolute;width:140px;height:35px;top:0;left:0;background:url(http://a.tbcdn.cn/tbsp/img/header/logo.png);}
    </style>

    <body data-spm="1">
        <div id="page">
            <div id="content" class="grid-c">
                    
                <!--收货地址信息-->
                <div id="address" class="address" style="margin-top: 20px;" data-spm="2">
                    <form name="addrForm" id="addrForm" action="#">
                        <h3>确认收货地址
                             <span class="manage-address">
                                <a href="" target="_blank" title="管理我的收货地址" class="J_MakePoint" data-point-url="">管理收货地址</a>
                             </span>
                        </h3>
                        <ul id="address-list" class="address-list">
                            
                            @foreach($data as $key => $val)
                            <li class="J_Addr J_MakePoint clearfix  J_DefaultAddr "  data-point-url="http://log.mmstat.com/buy.1.20">
                                <s class="J_Marker marker"></s>
                                <span class="marker-tip">寄送至</span>
                                <div class="address-info">
                                    <a href="#" class="J_Modify modify J_MakePoint" data-point-url="http://log.mmstat.com/buy.1.21">修改本地址</a>
                                    <input name="address" class="J " type="radio" value="674944241" data-point-url="" ah:params="" checked="checked" >
                                        <label class="user-address">
                                             {{ $val->address }} ({{ $val->name }} 收) {{ $val->phone }}
                                        </label>
                                    <em class="tip" style="display: none">默认地址</em>
                                    <a class="J_DefaultHandle set-default J_MakePoint" href="/auction/update_address_selected_status.htm?addrid=674944241" style="display: none" data-point-url="http://log.mmstat.com/buy.1.18">设置为默认收货地址</a>
                                </div>
                            </li>
                            @endforeach

                        </ul>  
                        <ul id="J_MoreAddress" class="address-list hidden">
                        </ul>

                        <div class="address-bar">
                            <a href="#" class="new J_MakePoint" id="J_NewAddressBtn">使用新地址</a>
                        </div>
                    </form>
                </div>
                <!--收货地址结束-->

                
                <!--订单提交开始-->
                <form id="J_Form" name="J_Form" action="{{ url('/home/num/my/inserts') }}" method="post">
                    <div>
                        <h3 class="dib">确认订单信息</h3>
                        <table cellspacing="0" cellpadding="0" class="order-table" id="J_OrderTable" summary="统一下单订单信息区域">
                        <caption style="display: none">统一下单订单信息区域</caption>
                            <thead>
                                <tr>
                                    <th class="s-title">店铺宝贝<hr/></th>
                                    <th class="s-price">单价(元)<hr/></th>
                                    <th class="s-amount">数量<hr/></th>
                                    <th class="s-agio">优惠方式(元)<hr/></th>
                                    <th class="s-total">小计(元)<hr/></th>
                                </tr>
                            </thead>
                        
                        {{ csrf_field() }}
                            <tbody data-spm="3" class="J_Shop" data-tbcbid="0" data-outorderid="47285539868"  data-isb2c="false" data-postMode="2" data-sellerid="1704508670">
                                <tr class="first">
                                    <td colspan="5">
                                    </td>
                                </tr>
                                

                                @foreach($r as $k => $v)
                                <tr class="shop blue-line">
                                    <td colspan="3">
                                        卖家：<a class="J_ShopName J_MakePoint" data-point-url="http://log.mmstat.com/buy.1.6" href="http://store.taobao.com/shop/view_shop.htm?shop_id=104337282" target="_blank" title="{{ $v->nickname }}">{{ $v->nickname }}</a>
                                        <span class="J_WangWang"  data-nick="{{ $v->nickname }}" data-display="inline" ></span>
                                    </td>
                                    <td colspan="2" class="promo">
                                        <div>
                                            <ul class="scrolling-promo-hint J_ScrollingPromoHint">
                                         </ul>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="item" data-lineid="19614514619:31175333266:35612993875" data-pointRate="0">
                                    <td class="s-title">
                                        <a href="#" target="_blank" title="{{ $v->connect }}" class="J_MakePoint" data-point-url="http://log.mmstat.com/buy.1.5">
                                            <img src="{{ url('/uploads/auction') }}/{{ $v->pic }}" class="itempic">
                                            <input type="hidden" name="id" value="{{ $v->id }}">
                                            <span class="title J_MakePoint" data-point-url="http://log.mmstat.com/buy.1.5">{{ $v->connect }}</span>
                                        </a>

                                        <div class="props">
                                            <span>{{ $v->connect }}</span>
                                        </div>
                                        <a title="消费者保障服务，卖家承诺商品如实描述" href="#" target="_blank">
                                            <img src="http://img03.taobaocdn.com/tps/i3/T1bnR4XEBhXXcQVo..-14-16.png"/>
                                        </a>
                                        <div>
                                            <span style="color:gray;">卖家承诺72小时内发货</span>
                                        </div>
                                    </td>

                                    <td class="s-price">
                                        <span class='price '>
                                        <em class="style-normal-small-black J_ItemPrice">{{ $v->newpage }}元</em>
                                        </span>
                                    </td>

                                    <td class="s-amount" data-point-url="">
                                    </td>

                                    <td class="s-agio">
                                        <div class="J_Promotion promotion" data-point-url="">无优惠</div>
                                    </td>

                                    <td class="s-price">
                                        <span class='price'>
                                        <em class="J_Price">{{ $v->newpage }}元</em>
                                        </span>
                                    </td>

                                </tr>
                                @endforeach

                                <tr class="item-service">
                                    <td colspan="5" class="servicearea" style="display: none"></td>
                                </tr>

                                <tr class="blue-line" style="height: 2px;">
                                    <td colspan="5"></td>
                                </tr>

                                <tr class="other other-line">
                                    <td colspan="5">
                                        <ul class="dib-wrap">
                                            <li class="dib user-info">
                                                <ul class="wrap">
                                                    <li>
                                                        <div class="field gbook">
                                                            <label class="label">给卖家留言：</label>
                                                            <textarea style="width:350px;height:25px; font-size: 18px; resize: none;" title="选填：对本次交易的补充说明（建议填写已经和卖家达成一致的说明）" name=""></textarea>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="dib extra-info">
                                                <div class="shoparea">
                                                    <ul class="dib-wrap">
                                                        <li class="dib title">店铺优惠：</li>
                                                        <li class="dib sel"><div class="J_ShopPromo J_Promotion promotion clearfix" data-point-url="http://log.mmstat.com/buy.1.16"></div></li>
                                                        <li class="dib fee">  
                                                            <span class='price '>-<em class="style-normal-bold-black J_ShopPromo_Result"  >0.00</em></span>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="shoppointarea"></div>

                                                
                                                <div class="extra-area">
                                                    <ul class="dib-wrap">
                                                        <li class="dib title">发货时间：</li>
                                                        <li class="dib content">卖家承诺订单在买家付款后，72小时内发货</li>
                                                    </ul>
                                                </div>

                                                <div class="servicearea" style="display: none"></div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr class="shop-total blue-line">
                                    <td colspan="5">店铺合计(
                                        <span class="J_Exclude" style="display: none">不</span>含运费
                                        <span class="J_ServiceText" style="display: none">，服务费</span>)：
                                        <span class='price g_price '>
                                            <span>&yen;</span>
                                            <em class="style-middle-bold-red J_ShopTotal" id="hj"></em>
                                            <input type="hidden" name="cosprice" value="" />
                                        </span>
                                    </td>
                                </tr>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="5">

                                        <div class="order-go" data-spm="4">

                                            <div class="J_AddressConfirm address-confirm">

                                                <div class="kd-popup pop-back" style="margin-bottom: 40px;">

                                                    <div class="box">
                                                        <div class="bd">
                                                            <div class="point-in">
                                                                <em class="t">实付款：</em>  
                                                                <span class='price g_price '>
                                                                    <span>&yen;</span>
                                                                    <em class="style-large-bold-red"  id="J_ActualFee"></em>
                                                                </span>
                                                            </div>
                                                            <ul>
                                                                <li><em>寄送至:</em>
                                                                    <span id="J_AddrConfirm" style="word-break: break-all;">
                                                                       
                                                                    </span>
                                                                    <input type="hidden" name="address" id="addr" value="" >
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <a href="{{ url('/home/details/shopcar') }}" class="back J_MakePoint" target="_top" data-point-url="">返回购物车</a>
                                                    <button type="submit" id="J_Go" class=" btn-go" tabindex="0" style="border: 0px;">提交订单<b class="dpl-button"></b></button>
                                                </div>
                                            </div>

                                            <div class="J_confirmError confirm-error">
                                                <div class="msg J_shopPointError" style="display: none;">
                                                    <p class="error">积分点数必须为大于0的整数</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
                <!--订单提交结束-->
                
            </div>
            <div id="footer"></div>
        </div>
    
        <script type="text/javascript">

            ref();

            function ref(){
                $('.J').each(function(){

                    var address = $(this).next().html();

                    $('#J_AddrConfirm').html(address);

                    $('#addr').val(address);

                });
            }


            $('.J').each(function(){

                $(this).click(function(){

                    var address = $(this).next().html();

                    $('#J_AddrConfirm').html(address);

                    $('#addr').val(address);

                });

            });


            refreshCart()

            //刷新购物车函数
            function refreshCart(){

                var all=0;

                $(".J_Price").each(function(){

                    all += parseFloat($(this).html());

                });

                all = changeTwof(all);
               
                $('#hj').html(all);    
                $('#hj').next().val(all);    
                $('#J_ActualFee').html(all);       
            }

            //转换为两位小数的浮点数字串函数
            function changeTwof(x) {

                var f_x = parseFloat(x);

                if (isNaN(f_x)) {

                    return false;
                }

                var f_x = Math.round(x * 100) / 100;

                var s_x = f_x.toString();

                var pos_decimal = s_x.indexOf('.');

                if (pos_decimal < 0) {

                    pos_decimal = s_x.length;

                    s_x += '.';
                }

                while (s_x.length <= pos_decimal + 2) {

                    s_x += '0';

                }

                return s_x;
            }


        </script>

    </body>
</html>
@endsection