@extends('home.layout')

@section('content')
<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box order-list-box">

            <div class="box-hd" style="margin-left: 300px;">
                <h1 class="title">我的订单
                    <small>请谨防钓鱼链接或诈骗电话，
                        <a href="https://www.mi.com/service/buy/antifraud/" target="_blank" data-stat-id="78d07fef654ba47a">了解更多&gt;
                        </a>
                    </small>
                </h1>
                <div class="more clearfix">
                    <ul class="filter-list J_orderType">
                        <li class="first active"><a href="" data-type="0" data-stat-id="89d882413195fd4c">全部有效订单</a></li>
                        <li class=""><a id="J_unpaidTab" href="" data-type="7" data-stat-id="8edf501aa1eca097">待支付</a></li>
                        <li class=""><a id="J_sendTab" href="" data-type="8" data-stat-id="8308bdcf62c72b1b">待收货</a></li>
                        <li class=""><a href="" data-type="5" data-stat-id="d99182d42018ae52">已关闭</a></li>
                    </ul>
                </div>
            </div>
            
            @if(!session())
            <div class="box-bd">
                <div id="J_orderList">
                    <p class="empty">当前没有交易订单。</p>
                </div>
                <div id="J_orderListPages"></div>
            </div>
            @else

            <div id="J_navMenu" class="header-nav-menu">
                <div class="container">
                    <table border="5">
                        <tr>
                            <th style="text-align: center; font-size: 20px;">订单号</th>
                            <th style="text-align: center; font-size: 20px;">商品信息</th>
                            <th style="text-align: center; font-size: 20px;">金额</th>
                            <th style="text-align: center; font-size: 20px;">操作</th>
                        </tr>
                        <tr style="text-align: center;">
                            <td>131231231</td>
                            <td>sadsasa</td>
                            <td>13</td>
                            <td>请付款</td>
                        </tr>
                    </table>
                </div>
            </div>
            
            @endif

        </div>
    </div>
</div>

@endsection