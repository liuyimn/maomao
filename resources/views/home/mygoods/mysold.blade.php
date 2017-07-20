@extends('home.userlout')

@section('content')

<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box">
            <div class="box-hd">
                <h1 class="title">我卖出商品</h1>
            </div>

            <div class="box-bd">
                <div class="xm-goods-list-wrap">
                    <ul class="xm-goods-list clearfix">
                    @if(empty($data))
                        <div class="box-bd">
                            <p class="empty">您暂未任何商品卖出。</p>
                            <div class="xm-pagenavi"></div>  
                        </div>
                    @else
                    @foreach($data as $key => $v)
                        <li class="xm-goods-item">
                            <div class="figure figure-img">
                                <a href="{{ url('home/details') }}/{{ $v->id }}" >
                                    <img src="{{ asset('uploads/shop') }}/{{ $v->pic }}">
                                </a>
                            </div>
                                <h3 class="title"><a href="" >{{ $v->name }}</a></h3>
                                <p class="price">{{ $v->newpage }}</p>
                                <p class="rank">{{ $v->connect }}</p>
                            <div class="actions">
                                <a class="btn btn-small btn-primary" target="_blank" href="{{ url('home/details') }}/{{ $v->id }}">查看详情</a>
                            </div>
                        </li>
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