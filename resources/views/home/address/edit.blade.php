@extends('home.userlout')

@section('content')

<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box">
            <div class="box-hd">
                <h1 class="title">修改收货地址</h1>
            </div>
                <div class="box-bd">
                        <form action="{{ url('home/address/update') }}" method="post">
                            <div class="modal-body">
                                <div class="form-box clearfix">
                                    <div class="form-section form-name">
                                        <label class="input-label" for="user_name">姓名</label>
                                        <input class="input-text J_addressInput" type="text" name="name" value="{{ $data->name }}" placeholder="收货人姓名">
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        {{ csrf_field() }}
                                    </div>
                                    <div class="form-section form-phone">
                                        <label class="input-label" for="user_phone">手机号</label>
                                        <input class="input-text J_addressInput" type="text" value="{{ $data->phone }}" name="phone" placeholder="11位手机号">
                                    </div>
                                    <div class="form-section form-address-detail">
                                        <label class="input-label" for="user_adress">详细地址</label>
                                        <textarea class="input-text J_addressInput" style="resize:none;" type="text" name="address" placeholder="详细地址，路名或街道名称，门牌号">{{ $data->address }}</textarea>
                                    </div>
                                    <div class="form-section form-tip-msg clearfix" id="J_formTipMsg"></div>
                                </div>

                                <button type="submit" class="btn btn-primary">保存</button>
                                <a href="{{ url('home/address/index') }}" class="btn btn-gray" data-toggle="modal" >取消</a>
                        </div>
                        </form>
                </div>
        </div>
    </div>
</div>
      
</div>
</div>
</div>








<!-- .modal-globalSites END -->

<script src="{{ asset('home/address/base.min.js') }}"></script>
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

<script type="text/javascript" src="{{ asset('home/address/address.min.js') }}"></script>	        
            
<script type="text/javascript" src="{{ asset('home/address/user.min.js') }}"></script>

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


</body>
</html>
@endsection