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
</head>
<body>




<div class="breadcrumbs">
    <div class="container">
        <a href="https://www.mi.com/index.html" data-stat-id="b0bcd814768c68cc" onclick="_msq.push([&#39;trackEvent&#39;, &#39;eec116fe8b6c555f-b0bcd814768c68cc&#39;, &#39;//www.mi.com/index.html&#39;, &#39;pcpid&#39;, &#39;&#39;]);">首页</a><span class="sep">&gt;</span><span>收货地址</span>    </div>
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
                                <li><a href="https://static.mi.com/order/" data-stat-id="8f3d1bffd166dc22" onclick="_msq.push([&#39;trackEvent&#39;, &#39;eec116fe8b6c555f-8f3d1bffd166dc22&#39;, &#39;//static.mi.com/order/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">我的订单</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">个人中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li><a href="https://order.mi.com/portal?r=45562.1499738719" data-stat-id="e171266eb8fa4af6" onclick="_msq.push([&#39;trackEvent&#39;, &#39;eec116fe8b6c555f-e171266eb8fa4af6&#39;, &#39;https://order.mi.com/portal&#39;, &#39;pcpid&#39;, &#39;&#39;]);">我的个人中心</a></li>
                                <li class="active"><a href="https://order.mi.com/user/address?r=45562.1499738719" data-stat-id="becec4bcb77b9d67" onclick="_msq.push([&#39;trackEvent&#39;, &#39;eec116fe8b6c555f-becec4bcb77b9d67&#39;, &#39;https://order.mi.com/user/address&#39;, &#39;pcpid&#39;, &#39;&#39;]);">收货地址</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">账户管理</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li><a href="https://account.xiaomi.com/" target="_blank" data-stat-id="35eef2fd7467d6ca" onclick="_msq.push([&#39;trackEvent&#39;, &#39;eec116fe8b6c555f-35eef2fd7467d6ca&#39;, &#39;https://account.xiaomi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">个人信息</a></li>
                                <li><a href="https://account.xiaomi.com/pass/auth/security/home#service=setPassword" target="_blank" data-stat-id="ae5ee0188510f1e6" onclick="_msq.push([&#39;trackEvent&#39;, &#39;eec116fe8b6c555f-ae5ee0188510f1e6&#39;, &#39;https://account.xiaomi.com/pass/auth/security/home#service=setPassword&#39;, &#39;pcpid&#39;, &#39;&#39;]);">修改密码</a></li>
                                <li><a href="http://uvip.xiaomi.cn/" target="_blank" data-stat-id="c130c3dbf41fd4d8" onclick="_msq.push([&#39;trackEvent&#39;, &#39;eec116fe8b6c555f-c130c3dbf41fd4d8&#39;, &#39;http://uvip.xiaomi.cn&#39;, &#39;pcpid&#39;, &#39;&#39;]);">社区VIP认证</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box">
            <div class="box-hd">
                <h1 class="title">收货地址</h1>
            </div>
                <div class="box-bd">
                    <div class="user-address-list J_addressList clearfix">
                        
                        <a href="{{ url('home/address/add') }}"><div class="address-item address-item-new" id="J_newAddress">
                            <i class="iconfont"></i>
                            添加新地址
                        </div></a>
                        <script>

                        </script>
                        @foreach($data as $key => $val)
                        <div class="address-item J_addressItem" >
                            <dl>
                                <dt>
                                <em class="uname">{{ $val->name }}</em>
                                </dt>
                                <dd class="utel">{{ $val->phone }}</dd>
                                <dd class="uaddress">{{ $val->address }}</dd>
                            </dl>
                            <div class="actions">
                                <a class="modify J_addressModify" href="{{ url('home/address/edit') }}/{{ $val->id }}" >修改</a>
                                <a class="modify J_addressDel" href="{{ url('home/address/delete') }}/{{ $val->id }}" >删除</a>
                            </div>
                         </div>
                         @endforeach

                    </div>
                </div>
        </div>
    </div>
</div>
      
    </div>
    </div>
</div>

<script src="{{ asset('home/address/base.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('home/address/user.min.js') }}"></script>
</body>
</html>