<!DOCTYPE html>
<!-- saved from url=(0052)https://order.mi.com/user/address?r=56942.1499738455 -->
<html lang="zh-CN" xml:lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" async="" src="{{ asset('home/address/mstr.js') }}"></script>
<script type="text/javascript" async="" src="{{ asset('home/address/jquery.statData.min.js') }}"></script>
<script type="text/javascript" async="" src="{{ asset('home/address/xmst.js') }}"></script>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title>我的收货地址</title>
<meta name="viewport" content="width=1226">
<meta name="description" content="">
<meta name="keywords" content="小米商城">
<link rel="stylesheet" href="{{ asset('home/address/base.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('home/address/main.min.css') }}">
<link rel="stylesheet" href="{{ asset('home/address/css/demo.css') }}">
<link rel="stylesheet" href="{{ asset('home/address/css/layout.css') }}">
</head>
<body>




<div class="breadcrumbs">
    <div class="container">
        <a href="" >首页</a><span class="sep">&gt;</span><span>收货地址</span>
    </div>
</div>

<div class="page-main user-main">
    <div class="container">
        <div class="row">
            <div class="span4">
                <div class="uc-box uc-sub-box">
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">订单中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li><a href="">我的订单</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">个人中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li><a href="" >我的个人中心</a></li>
                                <li class="active"><a href="" >收货地址</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">账户管理</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li><a href="" >个人信息</a></li>
                                <li><a href="" >修改密码</a></li>
                                <li><a href="" target="_blank" >社区VIP认证</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
                <div class="span16">
                    <div class="uc-box uc-main-box">
                        <div class="uc-content-box">
                            <div class="box-hd">
                                <h1 class="title">添加收货地址</h1>
                            </div>
                                <div class="box-bd">
                                    <form action="{{ url('home/address/insert') }}" method="post">
                                        <div class="modal-body">
                                            <div class="form-box clearfix">
                                                <div class="form-section form-name">
                                                    <label class="input-label" for="user_name">姓名</label>
                                                    <input class="input-text J_addressInput" type="text" name="name" value="{{ old('name') }}" placeholder="收货人姓名">
                                                    {{ csrf_field() }}
                                                </div>
                                                <div class="form-section form-phone">
                                                    <label class="input-label" for="user_phone">手机号</label>
                                                    <input class="input-text J_addressInput" type="text" name="phone" value="{{ old('phone') }}" placeholder="11位手机号">
                                                </div>
                                                <div class="form-section form-four-address form-section-active">
                                                    <fieldset id="city_china_val">
                                                            <p>所在地区：
                                                            <select name="addressa" class="province cxselect" data-value="" data-first-title="选择省" disabled="disabled"></select>
                                                            <select name="addressb" class="city cxselect" data-value="" data-first-title="选择市" disabled="disabled"></select>
                                                            <select name="addressc" class="area cxselect" data-value="" data-first-title="选择地区" disabled="disabled"></select>
                                                        </p>
                                                    </fieldset>
                                                    <!-- <input class="input-text J_addressInput" type="text" name="address" readonly="readonly" value="选择省 / 市 / 区 / 街道" placeholder="选择省 / 市 / 区 / 街道"> -->
                                                </div>
                                                <div class="form-section form-address-detail">
                                                    <label class="input-label" for="user_adress">详细地址</label>
                                                    <textarea class="input-text J_addressInput" style="resize:none;" type="text" name="user_adress" placeholder="详细地址，路名或街道名称，门牌号">{{ old('user_adress') }}</textarea>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">保存</button>
                                            <!-- <a href="" class="btn btn-primary">保存</a> -->
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

<script src="{{ asset('home/address/jquery-1.8.3.min.js') }}"></script>

<script src="{{ asset('home/address/js/jquery.cxselect.min.js') }}"></script>

<script>
$.cxSelect.defaults.url = '/home/address/js/cityData.min.json';

$('#city_china').cxSelect({
    selects: ['province', 'city', 'area']
});

$('#city_china_val').cxSelect({
    selects: ['province', 'city', 'area'],
    nodata: 'none'
});
</script>

</body>
</html>