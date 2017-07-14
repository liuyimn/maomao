@extends('home.layout')

@section('content')

<title>我的收货地址</title>
<meta name="viewport" content="width=1226">
<meta name="description" content="">
<meta name="keywords" content="小米商城">
<link rel="stylesheet" href="{{ asset('home/address/base.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('home/address/main.min.css') }}">
<script type="text/javascript" async="" src="{{ asset('home/address/mstr.js') }}"></script>
<script type="text/javascript" async="" src="{{ asset('home/address/jquery.statData.min.js') }}"></script>
<script type="text/javascript" async="" src="{{ asset('home/address/xmst.js') }}"></script>
</head>
<body>

<div class="breadcrumbs">
    <div class="container">
        <a href="" >首页</a><span class="sep">&gt;</span><span>收货地址</span>    </div>
</div>

<div class="page-main user-main">
    <div class="container">
        <div class="row">
            <div class="span3">
                <div class="uc-box uc-sub-box">
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">订单中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li><a href="" >我的订单</a></li>
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
                                <li><a href="" target="_blank" >个人信息</a></li>
                                <li><a href="" target="_blank" >修改密码</a></li>
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
                <h1 class="title">收货地址</h1>
                @if(session('info'))
                  <div class="alert alert-danger">
                    {{ session('info') }}
                  </div>
                  @endif
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
<script type="text/javascript" src="{{ asset('home/address/user.min.js') }}"></script>
@endsection