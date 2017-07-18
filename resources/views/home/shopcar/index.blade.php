<!doctype html>
<html lang="zh-CN" xml:lang="zh-CN">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta charset="UTF-8" />
    <title>我的购物车 - {{ $title }}</title>
    <meta name="viewport" content="width=1226" />
    <link rel="shortcut icon" href="//s01.mifile.cn/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="//s01.mifile.cn/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('/home/css/base.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/home/css/cart.min.css') }}" />
</head>
<body>
    <!-- 头部信息 -->
    @extends('home.layout')
    
    @section('content')
    <div class="page-main">
        <div id="did" class="container">
            <!--判断是否存在用户-->
            @if(!empty(session('user')))
                <!--判断是否存在商品-->
                @if(!empty($ka))
                    <div id="J_cartBox">
                        <div class="cart-goods-list" >
                            <div class="list-head clearfix">
                                <div class="col col-check">
                                    <i id="J_selectUnAll">全选/清除所有</i>
                                </div>
                                <div class="col col-img">商品图片</div>
                                <div class="col col-name">商品名称</div>
                                <div class="col col-price">单价</div>
                                <div class="col col-total">&nbsp;</div>
                                    <div class="col col-num">数量</div>
                                <div class="col col-action">操作</div>
                            </div>
                            <!--遍历商品-->
                            @foreach($ka as $key => $val)
                                <div class="list-head clearfix">
                                    <div class="col col-check">
                                        <i class="iconfont icon-checkbox icon-checkbox" >&#x221a;</i>
                                    </div>
                                    <div class="col col-img"><img width="40" src="{{ url('/uploads/shop') }}/{{ $val->pic }}" alt=""></div>
                                    <div class="col col-name">{{ $val->name }}</div>
                                    <div class="col col-price">{{ $val->newpage }}</div>
                                    <div class="col col-total">&nbsp;</div>
                                    <div id="num" class="col col-num">1</div>
                                    <div class="col col-action">
                                        <a class="del" href="{{ url('/home/details/shopcar/del') }}/{{ $val->id }}" value="{{ $val->id }}">删除</a>
                                    </div>
                                </div>
                            @endforeach
                            <!--遍历商品结束-->
                            <div class="list-body" id="J_cartListBody">
                            </div>
                        </div>
                        <!-- 加价购 -->
                        <div class="raise-buy-box" id="J_raiseBuyBox">
                        </div>

                        <div class="cart-bar clearfix" id="J_cartBar">
                            <div class="section-left">
                                <a href="{{ url('/home/list/index') }}" class="back-shopping J_goShoping">继续购物</a>
                                <span class="cart-total ">共 
                                    <i id="J_cartTotalNum">{{ isset($res)?$res:0 }}</i> 件商品
                                </span>
                            </div>
                            <span class="activity-money ">
                                活动优惠：减 <i id="J_cartActivityMoney">0</i> 元
                            </span>
                            <span class="total-price">
                                合计（不含运费）：<em id="j"></em>元
                            </span>
                            <a href="{{ url('/home/num/my') }}" class="btn btn-a btn btn-primary" id="J_goCheckout">去结算</a>
                        </div>
                    </div>
                @else
                    <div class="cart-empty" id="J_cartEmpty">
                        <h2>您的购物车还是空的！</h2>
                        <p class="login-desc">登录后将显示您之前加入的商品</p>
                        <a href="#" class="btn btn-primary btn-login" id="J_loginBtn">立即登录</a>
                        <a href="{{ url('/home/list/index') }}" class="btn btn-primary btn-shoping J_goShoping">马上去购物</a>
                    </div>
                @endif
                <!--判断是否存在商品结束-->
            @else
                <!--判断session中商品是否存在-->
                @if(!session('userlist'))
                    <div class="cart-empty" id="J_cartEmpty">
                        <h2>您的购物车还是空的！</h2>
                        <p class="login-desc">登录后将显示您之前加入的商品</p>
                        <a href="#" class="btn btn-primary btn-login" id="J_loginBtn">立即登录</a>
                        <a href="{{ url('/home/list/index') }}" class="btn btn-primary btn-shoping J_goShoping">马上去购物</a>
                    </div>
                @else
                
                    <div id="J_cartBox">
                        <div class="cart-goods-list" >
                            <div class="list-head clearfix">
                                <div class="col col-check">
                                    <i id="J_selectUnAll">全选/清除所有</i>
                                </div>
                                <div class="col col-img">商品图片</div>
                                <div class="col col-name">商品名称</div>
                                <div class="col col-price">单价</div>
                                <div class="col col-total">&nbsp;</div>
                                    <div class="col col-num">数量</div>
                                <div class="col col-action">操作</div>
                            </div>

                            @foreach($data as $key => $val)

                                <div class="list-head clearfix">
                                    <div class="col col-check">
                                        <i class="iconfont icon-checkbox icon-checkbox" >&#x221a;</i>
                                    </div>
                                    <div class="col col-img"><img width="40" src="{{ url('/uploads/shop') }}/{{ $val->pic }}" alt=""></div>
                                    <div class="col col-name">{{ $val->name }}</div>
                                    <div class="col col-price">{{ $val->newpage }}</div>
                                    <div class="col col-total">&nbsp;</div>
                                    <div id="num" class="col col-num">1</div>
                                    <div class="col col-action">
                                        <a class="del" href="{{ url('/home/details/shopcar/del') }}/{{ $key }}" value="{{ isset($key)?$key:0 }}">删除</a>
                                    </div>
                                </div>  
                            @endforeach

                            <div class="list-body" id="J_cartListBody">
                            </div>
                        </div>
                        <!-- 加价购 -->
                        <div class="raise-buy-box" id="J_raiseBuyBox">
                        </div>

                        <div class="cart-bar clearfix" id="J_cartBar">
                            <div class="section-left">
                                <a href="{{ url('/home/list/index') }}" class="back-shopping J_goShoping">继续购物</a>
                                <span class="cart-total ">共 
                                    <i id="J_cartTotalNum">{{ $res }}</i> 件商品
                                </span>
                            </div>
                            <span class="activity-money ">
                                活动优惠：减 <i id="J_cartActivityMoney">0</i> 元
                            </span>
                            <span class="total-price">
                                合计（不含运费）：<em id="j"></em>元
                            </span>
                            <a href="{{ url('/home/num/my') }}" class="btn btn-a btn btn-primary" id="J_goCheckout">去结算</a>
                        </div>
                    </div>
                @endif
                <!--判断session中商品结束-->
            @endif
            <!--判断是否存在用户结束-->
        </div>
    </div>
   
    
    <div style="display:none" class="cart-empty" id="con">
        <h2>您的购物车还是空的！</h2>
        <p class="login-desc">登录后将显示您之前加入的商品</p>
        <a href="#" class="btn btn-primary btn-login" id="J_loginBtn">立即登录</a>
        <a href="{{ url('/home/list/index') }}" class="btn btn-primary btn-shoping J_goShoping">马上去购物</a>
    </div>

    <div class="site-footer">
        <div class="container">
            <div class="footer-service">
                <ul class="list-service clearfix">
                    <li><a rel="nofollow" href="#"><i class="iconfont">&#xe634;</i>预约维修服务</a></li>
                    <li><a rel="nofollow" href="#"><i class="iconfont">&#xe635;</i>7天无理由退货</a></li>
                    <li><a rel="nofollow" href="#"><i class="iconfont">&#xe636;</i>15天免费换货</a></li>
                    <li><a rel="nofollow" href="#"><i class="iconfont">&#xe638;</i>满150元包邮</a></li>
                    <li><a rel="nofollow" href="#"><i class="iconfont">&#xe637;</i>520余家售后网点</a></li>
                </ul>
            </div>
            <div class="footer-links clearfix">
                
                <dl class="col-links col-links-first">
                    <dt>帮助中心</dt>
                    
                    <dd><a rel="nofollow" href="#" >账户管理</a></dd>
                    
                    <dd><a rel="nofollow" href="#" >购物指南</a></dd>
                    
                    <dd><a rel="nofollow" href="#" >订单操作</a></dd>
                    
                </dl>
                    
                <dl class="col-links ">
                    <dt>服务支持</dt>
                    
                    <dd><a rel="nofollow" href="#" >售后政策</a></dd>
                    
                    <dd><a rel="nofollow" href="#" >自助服务</a></dd>
                    
                    <dd><a rel="nofollow" href="#" >相关下载</a></dd>
                    
                </dl>
                    
                <dl class="col-links ">
                    <dt>线下门店</dt>
                    
                    <dd><a rel="nofollow" href="#" >大脸猫之家</a></dd>
                    
                    <dd><a rel="nofollow" href="#" >服务网点</a></dd>
                    
                    <dd><a rel="nofollow" href="#" >零售网点</a></dd>
                    
                </dl>
                    
                <dl class="col-links ">
                    <dt>关于大脸猫</dt>
                    
                    <dd><a rel="nofollow" href="#">了解大脸猫</a></dd>
                    
                    <dd><a rel="nofollow" href="#">加入大脸猫</a></dd>
                    
                    <dd><a rel="nofollow" href="#">联系我们</a></dd>
                    
                </dl>
                    
                <dl class="col-links ">
                    <dt>关注我们</dt>
                    
                    <dd><a rel="nofollow" href="#">新浪微博</a></dd>
                    
                    <dd><a rel="nofollow" href="#">大脸猫部落</a></dd>
                    
                    <dd><a rel="nofollow" href="#" data-toggle="modal" >官方微信</a></dd>
                    
                </dl>
                    
                <dl class="col-links ">
                    <dt>特色服务</dt>
                    
                    <dd><a rel="nofollow" href="#">防伪查询</a></dd>
                    
                </dl>
                    
                <div class="col-contact">
                    <p class="phone">大脸猫客服</p>
                    <p>
                     7x24小时全天陪伴<br>为您解决问题
                    </p>
                    <a rel="nofollow" class="btn btn-line-primary btn-small" href="#"><i class="iconfont">&#xe600;</i> 立即开始咨询</a>            
                </div>
            </div>
        </div>
    </div>
    <div class="site-info">
        <div class="container">
            <div class="info-text">
                <p class="sites">
                    <a rel="nofollow" href=""   target="_blank">大脸猫商城</a>
                    <span class="sep">|</span>
                    <a rel="nofollow" href=""   target="_blank">商品</a>
                    <span class="sep">|</span>
                    <a rel="nofollow" href="" data-toggle="modal" >Select Region</a>            
                </p>
                <p>&copy;<a href="" target="_blank" title="mi.com">mao.com</a> 京ICP证110507号 
                    <a href=""  target="_blank" rel="nofollow">京ICP备10046444号</a> 
                    <a rel="nofollow"  href="" target="_blank">京公网安备11010802020134号 </a>
                    <a rel="nofollow"  href="" target="_blank" rel="nofollow">京网文[2014]0059-0009号</a>
                    <br> 违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试
                </p>
            </div>
        </div>
    </div>



    <!-- .modal-globalSites END -->
    <script src="{{asset('/home/js/base.min.js')}}"></script>
    <script src="{{asset('/home/js/jquery-1.11.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/home/js/cart.min.js')}}"></script>
    <script src="{{asset('/home/js/xmsg_ti.js')}}"></script>
    <script>

        //商品选中事件
        $(".iconfont.icon-checkbox.icon-checkbox").click(function(){

            if($(this).hasClass('iconfont icon-checkbox icon-checkbox-selected')){

                $(this).attr('class', 'iconfont icon-checkbox icon-checkbox');

            }else{

                $(this).attr('class', 'iconfont icon-checkbox icon-checkbox-selected');

            }

            refreshCart();
         
        });

        //刷新购物车
        refreshCart();        

        //刷新购物车函数
        function refreshCart(){

            var all=0;

            $("i[class='iconfont icon-checkbox icon-checkbox-selected']").each(function(){

                all += parseFloat($(this).parents().next().next().next().html());

            });

            all = changeTwof(all);
           
            $('#j').html(all);           
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

        //全选或清除鼠标移入移出
        $('#J_selectUnAll').hover(function(){
            $('#J_selectUnAll').css('cursor', 'pointer');
        }, function(){
            $('#J_selectUnAll').css('cursor', 'default');
        });


        //全选或清除事件
        $('#J_selectUnAll').click(function(){

            if(!$('.iconfont.icon-checkbox.icon-checkbox').hasClass('iconfont icon-checkbox icon-checkbox-selected')){

                $('.iconfont.icon-checkbox.icon-checkbox').each(function(){

                    $(this).attr('class', 'iconfont icon-checkbox icon-checkbox-selected');
                   
                    refreshCart();
                });

            }else{

                $('.iconfont.icon-checkbox.icon-checkbox').each(function(){

                    $(this).attr('class', 'iconfont icon-checkbox icon-checkbox');
                   
                    refreshCart();
                });
            }
        });
        

        // $('.del').each(function(){

        //     $(this).click(function(){

        //         //获取id
        //         var val = $(this).attr('value');
                
        //         $.get('/home/details/shopcar/del', {'key':val} ,function(data){

        //             if(data == 0){

        //                 // $('#J_cartBox').empty();
        //                 $(this).parents().parents().remove();

        //                 // var num = $('#con').clone().css('display','block');
                        
        //                 // $('#did').append(num);
                    
        //             }
        //         });

        //     });

        // });
    </script>
    <!--mae_monitor-->

     @endsection
</body>
</html>
