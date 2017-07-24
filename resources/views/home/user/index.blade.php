@extends('home.userlout')

@section('content')
            
<div class="span16">
    <div class="protal-content-update hide">
        <div class="protal-username">
            Hi,            时光。        </div>
    </div>
    <div class="uc-box uc-main-box">
        <div class="uc-content-box portal-content-box">
            <div class="box-bd">
                <div class="portal-main clearfix">
                    <div class="user-card">
                        <h2 class="username">{{ $res->nickname }}</h2>
                        <p class="tip">早上好～</p>
                        <a class="link" href="{{ url('home/userdetail/edit') }}">修改个人信息 &gt;</a>
                        <img class="avatar" src="{{ asset('uploads/user') }}/{{ $res->photo }}" width="150" height="150" alt="时光。">
                    </div>
                    <div class="user-actions">
                        <ul class="action-list">
                            <li>账户安全：<span class="level level-2">普通</span></li>
                            <li>绑定手机：<span class="tel">{{ session('user')->phone }}</span></li>
                            
                            <li>绑定邮箱：@if($user->email)<span class="tel">{{ $user->email }}</span>@else<span class="tel"></span><a href="{{ url('home/email/index') }}" class="btn btn-small btn-primary">绑定</a></li>@endif
                        </ul>
                    </div>
                </div>
                <div class="portal-sub">
                    <ul class="info-list clearfix">
                        <li>
                            <h3>待支付的订单：<span class="num">{{ $nums_user }}</span></h3>
                            <a href="{{ url('home/shopping/index') }}" >查看待支付订单<i class="iconfont"></i></a>
                            <a href="{{ url('home/shopping/index') }}" ><img src="{{ asset('/home/user/portal-icon-1.png') }}" alt=""></a>
                        </li>
                       
                        <li>
                            <h3>喜欢的商品：<span class="num">{{ $favorite }}</span></h3>
                            <a href="{{ url('home/favorite/index') }}">查看喜欢的商品<i class="iconfont"></i></a>
                            <a href="{{ url('home/favorite/index') }}"><img src="{{ asset('/home/user/portal-icon-4.png') }}" alt=""></a>
                        </li>

                         <li>
                        </li>
                        <li>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>        </div>
    </div>
</div>

<!-- .modal-globalSites END -->

<script type="text/javascript" async="" src="{{ asset('/home/user/xmst.js') }}"></script><script src="{{ asset('/home/user/base.min.js') }} "></script>

<script type="text/javascript" src="{{ asset('/home/user/user.min.js') }}"></script>

<script>
var _msq = _msq || [];
_msq.push(['setDomainId', 100]);
_msq.push(['trackPageView']);
(function() {
    var ms = document.createElement('script');
    ms.type = 'text/javascript';
    ms.async = true;
    ms.src = '/home/user/xmst.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ms, s);
})();
</script>
@endsection

</body></html>
