@extends('home.userlout')

@section('content')

<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box">
            <div class="box-hd">
                <h1 class="title">我买到的商品</h1>
                <div class="more clearfix hide">
                    <ul class="filter-list J_addrType">
                        <li class="first active"><a href="https://order.mi.com/user/favorite?r=61712.1500252256" data-stat-id="23ba2e43c89c0180" onclick="_msq.push([&#39;trackEvent&#39;, &#39;85a35dcaa091e037-23ba2e43c89c0180&#39;, &#39;https://order.mi.com/user/favorite&#39;, &#39;pcpid&#39;, &#39;&#39;]);">喜欢的商品</a></li>
                        <li><a href="https://order.mi.com/user/favorite?is_sale=0&amp;r=61712.1500252256" data-stat-id="2cd4af44ff3ad6c5" onclick="_msq.push([&#39;trackEvent&#39;, &#39;85a35dcaa091e037-2cd4af44ff3ad6c5&#39;, &#39;https://order.mi.com/user/favorite&#39;, &#39;pcpid&#39;, &#39;&#39;]);">已下架的商品</a></li>
                    </ul>
                </div>
            </div>
            <div class="box-bd">
                <div class="xm-goods-list-wrap">
                    <ul class="xm-goods-list clearfix">
                    @if(empty($w))
                        <div class="box-bd">
                            <p class="empty">您暂未购买任何商品。</p>
                            <div class="xm-pagenavi"></div>  
                        </div>
                    @else
                        @foreach($w as $key => $val)
                            @foreach($val as $v)
                                <li class="xm-goods-item">
                                    <div class="figure figure-img"><a href="{{ url('home/details') }}/{{ $v->id }}" ><img src="{{ asset('uploads/shop') }}/{{ $v->pic }}"></a></div>
                                        <h3 class="title"><a href="" >{{ $v->name }}</a></h3>
                                        <p class="price">{{ $v->newpage }}</p>
                                        <p class="rank">{{ $v->connect }}</p>
                                    <div class="actions">
                                        <a class="btn btn-small btn-primary" target="_blank" href="">查看详情</a>
                                    </div>
                                </li>
                            @endforeach
                        @endforeach
                    @endif
                    </ul>
                </div>
                <div class="xm-pagenavi"></div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>










<!-- .modal-globalSites END -->

<script type="text/javascript" async="" src="{{ asset('/home/favorite/xmst.js') }}"></script>
<script src="{{ asset('/home/favorite/base.min.js') }}"></script>
<script>
(function() {
    MI.namespace('GLOBAL_CONFIG');
    MI.GLOBAL_CONFIG = {
        orderSite: 'https://order.mi.com',
        wwwSite: '//www.mi.com',
        cartSite: '//cart.mi.com',
        itemSite: '//item.mi.com',
        assetsSite: '//s01.mifile.cn',
        listSite: '//list.mi.com',
        searchSite: '//search.mi.com',
        mySite: '//my.mi.com',
        damiaoSite: 'http://tp.hd.mi.com/',
        damiaoGoodsId:[],
        logoutUrl: 'https://order.mi.com/site/logout',
        staticSite: '//static.mi.com',
        quickLoginUrl: 'https://account.xiaomi.com/pass/static/login.html'
    };
    MI.setLoginInfo.orderUrl = MI.GLOBAL_CONFIG.orderSite + '/user/order';
    MI.setLoginInfo.logoutUrl = MI.GLOBAL_CONFIG.logoutUrl;
    MI.setLoginInfo.init(MI.GLOBAL_CONFIG);
    MI.miniCart.init();
    MI.updateMiniCart();
})();
</script>

<script type="text/javascript" src="{{ asset('/home/favorite/user.min.js') }}"></script>


<script>
var _msq = _msq || [];
_msq.push(['setDomainId', 100]);
_msq.push(['trackPageView']);
(function() {
    var ms = document.createElement('script');
    ms.type = 'text/javascript';
    ms.async = true;
    ms.src = '//c1.mifile.cn/f/i/15/stat/js/xmst.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ms, s);
})();
</script>
@endsection