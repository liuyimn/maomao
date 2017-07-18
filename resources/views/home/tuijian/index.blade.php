@extends('home.layout')
@section('content')
<!DOCTYPE html>
<html><head> 
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
  <title>用二手，聪明之选——猫猫二手优品</title> 
  <meta http-equiv="X-UA-Compatible" content="IE=Edge"> 
  <meta name="description" content="用二手，聪明之选——苏宁二手优品"> 
  <meta name="keywords" content="用二手，聪明之选——苏宁二手优品"> 
  <link href="{{ asset('home/tuijian') }}/css.css" rel="stylesheet" type="text/css"> 
  <link rel="shortcut icon" href="" type="image/x-icon"> 
  <style type="text/css">
        img{vertical-align:top;}
        img.err-cp{background:url(http://script.suning.cn/css/ShoppingArea/V8/home/{ asset('home/tuijian/') }/blankbg.gif) no-repeat 50% 50%;}
        html{overflow-x:hidden;}
       .bodyBG{width:100%;background:#daf6ff; url({ asset('home/tuijian/') }/bodyBG1a.jpg) repeat;}
        .warp{width:100%;position:relative;}
         .warp .bg_coat{position: relative;width: 1920px;z-index: 1;left: 50%;margin-left: -960px;}
      
    .warp .bg_01{width:100%;height:258px;background: url('{{ asset('home/tuijian') }}/bg_01.jpg') no-repeat center top;}
    .warp .bg_02{width:100%;height:400px;background: url('{{ asset('home/tuijian') }}/bg_02.jpg') no-repeat center top;}
    .warp .bg_03{width:100%;height:400px;background: url('{{ asset('home/tuijian') }}/bg_03.jpg') no-repeat center top;}
    .warp .bg_04{width:100%;height:400px;background: url('{{ asset('home/tuijian') }}/bg_04.jpg') no-repeat center top;} 
    .warp .bg_05{width:100%;height:400px;background: url('{{ asset('home/tuijian') }}/bg_05.jpg') no-repeat center top;}
    .warp .bg_06{width:100%;height:400px;background: url('{{ asset('home/tuijian') }}/bg_06.jpg') no-repeat center top;}
    .warp .bg_07{width:100%;height:400px;background: url('{{ asset('home/tuijian') }}/bg_07.jpg') no-repeat center top;}
    .warp .bg_08{width:100%;height:400px;background: url('{{ asset('home/tuijian') }}/bg_08.jpg') no-repeat center top;}
    .warp .bg_09{width:100%;height:400px;background: url('{{ asset('home/tuijian') }}/bg_09.jpg') no-repeat center top;}
    .warp .bg_10{width:100%;height:400px;background: url('{{ asset('home/tuijian') }}/bg_10.jpg') no-repeat center top;}
    .warp .bg_11{width:100%;height:400px;background: url('{{ asset('home/tuijian') }}/bg_11.jpg') no-repeat center top;}
        .warp .bg_12{width:100%;height:400px;background: url('{{ asset('home/tuijian') }}/bg_12.jpg') no-repeat center top;}
    .warp .bg_13{width:100%;height:400px;background: url('{{ asset('home/tuijian') }}/bg_13.jpg') no-repeat center top;}
    .warp .bg_14{width:100%;height:247px;background: url('{{ asset('home/tuijian') }}/bg_14.jpg') no-repeat center top;}  

  

    
    
        .main{width:1000px;position:absolute;left:50%;margin-left:-500px;top:0;z-index: 2;}
        area{outline:none;}

        /*悬浮样式部分start---------------------------------------------------------------------------------------*/
             .float{display: none;}
          
            #rightFloat{
                width: 113px;
                height: 313px;
                z-index: 999;
                position: fixed;
                top: 120px;
                left: 50%;
                margin-left: 510px;
                _position: absolute;
                _top: expression(eval(document.documentElement.scrollTop + 170));            
            }
           /*左悬浮样式开始*/
            #leftFloat{
                display: block;
                width: 113px;
                height: 100%;
                z-index: 999;
                position: fixed;
                background-color: #000000;
                top: 0;
                left: 0;
                _position: absolute;
                _top: expression(eval(document.documentElement.scrollTop + 170)); 
            }
            #leftFloat ul{width: 114px;background-color: #000;height: 528px;position: absolute;top: 0px;}
            #leftFloat ul li{width: 57px;margin-bottom: 1px;text-align: center;height: 20px;overflow: hidden;position: relative;float: left; }
            #leftFloat ul li.col2{width: 114px;}
            #leftFloat ul li.col2 a{width: 114px;}
            #leftFloat ul li a{width: 56px;height: 20px;color: #fff;font-size: 12px;line-height: 20px;text-align: center;display: block;margin: 0 auto;position: relative;background-color: #434043;}
            #leftFloat ul li a.color2{background-color: #575357;}
            #leftFloat ul li a:hover{background-color: #fff;color: #000;}
            #leftFloat ul li.f-top{width: 114px;height: 116px;}
            #leftFloat ul li.f-top a{width: 114px;height: 116px;}
            #leftFloat ul li.top{width: 120px;height: 31px;position: relative;}  
            #leftFloat ul li.top a{width: 110px;height: 18px;background-color: #fff100;display: block;color: #000;font-size: 12px;line-height: 18px;text-align: center;text-decoration: none;position: absolute;left: 3px;bottom: 10px;font-weight: bold;}
            #leftFloat ul li.sao{width: 114px;background: none;height: 144px;}
            #leftFloat ul li.sao a{width: 114px;height: 140px;background: none;}
            #leftFloat ul li.backup{width: 114px;margin-top: -4px;}
            #leftFloat ul li.backup a{width: 116px;}
         /*左悬浮样式结束*/
            #rightFloat ul{width: 100px;background-color: #f70804;}
            #rightFloat ul li{width: 100px;height: 30px;margin-left: auto;margin-right: auto;margin-bottom: 1px;}
            #rightFloat .f-top{width: 100px;height: 110px;}
            #rightFloat ul li.f-up-top{width: 100px;height: 39px;}
            #rightFloat ul li a{width: 100%;height: 100%;display: block;background-color: #322f2f;text-align: center;color: #FFF;text-decoration: none;line-height: 30px;font-family: "Microsoft Yahei","微软雅黑";}
            #rightFloat ul li a:hover{background-color: #f70804;}



  #bottomFloat{
            width: 1920px;
            height: 66px;
            z-index: 9999;
            position: fixed;
            bottom: 0px;
            left: 50%;
            margin-left: -960px;
            _position: absolute;
        } 
            /*悬浮样式部分end--------------------------------------------------------------------------------------------*/
      
     
     
     
     
     
        /*商品样式开始*/

        .part{width: 100%;position: relative;}
        .temp-cps{font-family: "Microsoft Yahei","微软雅黑";margin: 0 auto;}
        .temp-cp{float: left;background-color: #fff;position: relative;}
    .temp-cps .cp .flag{width: 58px;height: 53px;position: absolute;left: 10px;top: -6px;display: none;}
        .temp-cps .cp .flag.a-6{background: url({ asset('home/tuijian/') }/ui6.png) no-repeat top;width: 70px;height: 70px;left: 150px;top: 5px;}
        .temp-cps .cp .flag.a-7{background: url({ asset('home/tuijian/') }/ui7.png)  no-repeat top;width: 70px;height: 70px;left: 150px;top: 5px;}
    .temp-cps .cp .flag.on{display: none;}
        
        .temp-cp .pro-img{display: block;text-align: center;}
        .temp-cp .pro-desc{padding-left: 10px;padding-right: 10px;font-size: 14px;font-weight: bold;color: #333333;margin-top: 12px;}
        .temp-cp .pro-name{padding-left: 10px;padding-right: 10px;font-size: 14px;color: #999999;}
        .temp-cp .bottom{height: 50px;width: 100%;position: absolute;left: 0;bottom: 0;background-color: #eeeeee;}

        .pro-oPrice{width: 100px;font-size: 12px;color: #969696;text-decoration: line-through;display: block;padding-left: 20px;position: absolute;left: 100px;top: 25px;}
        .pro-pPrice{width: 100px;font-size: 28px;color: #fe1b52;display: block;font-weight: bold;font-family: "impact","Microsoft Yahei","微软雅黑";line-height: 25px;position: absolute;left: 5px;top: 15px;}
        .pro-pPrice .fu{font-size: 20px;}
        .pro-saleNum{padding-left: 6px;padding-right: 6px;font-size: 14px;color: #fff;text-align: center;height: 20px;line-height: 20px;background-color: #fe1b52;border-radius: 10px;position: absolute;left: 125px;top: 5px;}
        .pro-btn{display: block;width: 110px;height: 50px;background: url({ asset('home/tuijian/') }/buy-btn.png) no-repeat;position: absolute;right: 0px;top: 0px;text-indent: -9999px;overflow: hidden;}
        .pro-btn:hover{text-decoration: none;}
         
        .temp-cps.col-3{width: 1000px;padding-bottom: 12px;}
        .temp-cps.col-3 .temp-cp{width: 324px;height: 368px;margin-left: 5px;border: 2px solid #f61d4b;}
        .temp-cps.col-3 .temp-cp.first{margin-left: 0;}

        .temp-cps.col-1{width: 1000px;padding-bottom: 6px;}
        .temp-cps.col-1 .temp-cp{width: 1000px;height: 306px;border: 2px solid #f61d4b;}
        .temp-cps.col-1 .temp-cp .pro-img{float: left;}
        .temp-cps.col-1 .temp-cp .pro-name{color: #4e4e4e;font-size: 16px;width: 450px;height: 70px;border-bottom: 1px dotted #dddddd;text-align: left;margin-left: 480px;line-height: 70px;}
        .temp-cps.col-1 .temp-cp .tips{font-size: 14px;color: #9b9b9b;width: 677px;margin-left: 495px;margin-top: 10px;}
        .temp-cps.col-1 .temp-cp .tips li{list-style-type:disc;}

        .temp-cps.col-1 .temp-cp .pro-oPrice{left: 570px;top: 268px;color: #9b9b9b;}
        .temp-cps.col-1 .temp-cp .pro-pPrice{left: 480px;top: 260px;color: #f61d4b;}
        .temp-cps.col-1 .temp-cp .pro-btn{width: 152px;height: 40px;background: #f61d4b;color: #fff;right: 20px;top: 250px;font-size: 18px;text-indent: 0;text-align: center;line-height: 40px;font-weight: bold;}
        .temp-cps.col-1 .temp-cp .time-down{position: absolute;width: 220px;height: 50px;left: 475px;top: 160px;color: #666666;}
        .temp-cps.col-1 .temp-cp .time-down .clock{width: 17px;height: 16px;background: url({ asset('home/tuijian/') }/clock.png) no-repeat;position: absolute;left: 4px;top: 0px;}
        .temp-cps.col-1 .temp-cp .time-down label{width: 50px;height: 20px;font-size: 14px;line-height: 20px;position: absolute;left: 30px;top: -3px;}
        .temp-cps.col-1 .temp-cp .pro-saleNum{left: 700px;top: 155px;background-color: transparent;color: #666;}
        .temp-cps.col-1 .temp-cp .pro-saleNum em{color: #f61d4b;display: inline-block;padding-right: 10px;padding-left: 10px;}
        /*商品样式结束*/
    
    
   
    .flagmnn{width: 65px;height: 59px;background: url({ asset('home/tuijian/') }/ui1.png) no-repeat 0px 0px;position: absolute;left: 255px;top:0px;}
    
    
      /*TAB切开始*/ 
      
        #tab_1{width: 990px;height: 850px;position: relative;}
        #tab_1 .tab-btns{width: 990px;height:60px;position: relative;background: url({ asset('home/tuijian/') }/off3.png) no-repeat center top;}
        #tab_1 .tab-btns .tab-btn{width: 330px;height:60px;float: left;}
        #tab_1 .tab-btns .tab-btn a{width: 100%;height: 100%;display: block;}
        #tab_1 .tab-btns .tab-btn.tb-1.on a{background: url({ asset('home/tuijian/') }/on3.png) no-repeat 0 top;}
        #tab_1 .tab-btns .tab-btn.tb-2.on a{background: url({ asset('home/tuijian/') }/on3.png) no-repeat -330px top;}
        #tab_1 .tab-btns .tab-btn.tb-3.on a{background: url({ asset('home/tuijian/') }/on3.png) no-repeat -660px top;}
        #tab_1 .tab-pane-box{width: 990px;height: 850px;position: relative;overflow: hidden;}
        #tab_1 .tab-pane-box .tab-panes{width: 993px;height: 850px;margin: 0;position: relative;}
        #tab_1 .tab-pane-box .tab-panes .tab-pane{display: none;}
        #tab_1 .tab-pane-box .tab-panes .tab-pane.on{display: block;}
        /*TAB切结束*/  
    </style> 
  <script type="text/javascript" async="" src="{{ asset('home/tuijian') }}/ssa.js"></script><script async="" src="{{ asset('home/tuijian') }}/analytics.js"></script><script type="text/javascript" async="" src="{{ asset('home/tuijian') }}/da_opt.js"></script><script type="text/javascript" async="" src="{{ asset('home/tuijian') }}/aywmq.htm"></script><script type="text/javascript">var sn = sn || {'context': '/emall', 'domain': 'www.suning.com','storeId': '10052','catalogId': '10051','memberDomain':'member.suning.com','online':'online.suning.com','cookieDomain':'.suning.com','categoryId':'0','searchDomain':'http://search.suning.com/emall/','sslDomain':'ssl.suning.com'};</script> 
  <script type="text/javascript">var sn = sn || {'context': '/emall', 'domain': 'www.suning.com','storeId': '10052','catalogId': '10051','memberDomain':'member.suning.com','online':'online.suning.com','cookieDomain':'.suning.com','categoryId':'0','searchDomain':'http://search.suning.com/emall/','sslDomain':'ssl.suning.com'};</script> 
  <script type="text/javascript">var sn = sn || {'context': '/emall', 'domain': 'www.suning.com','storeId': '10052','catalogId': '10051','memberDomain':'member.suning.com','online':'online.suning.com','cookieDomain':'.suning.com','categoryId':'0','searchDomain':'http://search.suning.com/emall/','sslDomain':'ssl.suning.com'};</script> 
  <script type="text/javascript">var sn = sn || {'context': '/emall', 'domain': 'www.suning.com','storeId': '10052','catalogId': '10051','memberDomain':'member.suning.com','online':'online.suning.com','cookieDomain':'.suning.com','categoryId':'0','searchDomain':'http://search.suning.com/emall/','sslDomain':'ssl.suning.com'};</script> 
  <script type="text/javascript">var sn = sn || {'context': '/emall', 'domain': 'www.suning.com','storeId': '10052','catalogId': '10051','memberDomain':'member.suning.com','online':'online.suning.com','cookieDomain':'.suning.com','categoryId':'0','searchDomain':'http://search.suning.com/emall/','sslDomain':'ssl.suning.com'};</script> 
  <script type="text/javascript">var sn = sn || {'context': '/emall', 'domain': 'www.suning.com','storeId': '10052','catalogId': '10051','memberDomain':'member.suning.com','online':'online.suning.com','cookieDomain':'.suning.com','categoryId':'0','searchDomain':'http://search.suning.com/emall/','sslDomain':'ssl.suning.com'};</script> 
  <script type="text/javascript">var sn = sn || {'context': '/emall', 'domain': 'www.suning.com','storeId': '10052','catalogId': '10051','memberDomain':'member.suning.com','online':'online.suning.com','cookieDomain':'.suning.com','categoryId':'0','searchDomain':'http://search.suning.com/emall/','sslDomain':'ssl.suning.com'};</script> 
  <script type="text/javascript">var sn = sn || {'context': '/emall', 'domain': 'www.suning.com','storeId': '10052','catalogId': '10051','memberDomain':'member.suning.com','online':'online.suning.com','cookieDomain':'.suning.com','categoryId':'0','searchDomain':'http://search.suning.com/emall/','sslDomain':'ssl.suning.com'};</script> 
  <script type="text/javascript">var sn = sn || {'context': '/emall', 'domain': 'www.suning.com','storeId': '10052','catalogId': '10051','memberDomain':'member.suning.com','online':'online.suning.com','cookieDomain':'.suning.com','categoryId':'0','searchDomain':'http://search.suning.com/emall/','sslDomain':'ssl.suning.com'};</script> 
  <script type="text/javascript">var sn = sn || {'context': '/emall', 'domain': 'www.suning.com','storeId': '10052','catalogId': '10051','memberDomain':'member.suning.com','online':'online.suning.com','cookieDomain':'.suning.com','categoryId':'0','searchDomain':'http://search.suning.com/emall/','sslDomain':'ssl.suning.com'};</script> 
  <script type="text/javascript">var sn = sn || {'context': '/emall', 'domain': 'www.suning.com','storeId': '10052','catalogId': '10051','memberDomain':'member.suning.com','online':'online.suning.com','cookieDomain':'.suning.com','categoryId':'0','searchDomain':'http://search.suning.com/emall/','sslDomain':'ssl.suning.com'};</script> 
  <script type="text/javascript">var sn = sn || {'context': '/emall', 'domain': 'www.suning.com','storeId': '10052','catalogId': '10051','memberDomain':'member.suning.com','online':'online.suning.com','cookieDomain':'.suning.com','categoryId':'0','searchDomain':'http://search.suning.com/emall/','sslDomain':'ssl.suning.com'};</script> 
  <script type="text/javascript">var sn = sn || {'context': '/emall', 'domain': 'www.suning.com','storeId': '10052','catalogId': '10051','memberDomain':'member.suning.com','online':'online.suning.com','cookieDomain':'.suning.com','categoryId':'0','searchDomain':'http://search.suning.com/emall/','sslDomain':'ssl.suning.com'};</script> 
 <script type="text/javascript" src="{{ asset('home/tuijian') }}/J_lazyload_shop.js"></script></head> 
 <body class="cityId_replace">
  <div class="bodyBG"> 
   <div class="snow-container"></div> 
   <div class="warp"> 
    <div class="bg_coat"> 
     <div class="bg_01"></div> 
     <div class="bg_02"></div> 
     <div class="bg_03"></div> 
     <div class="bg_04"></div> 
     <div class="bg_05"></div> 
     <div class="bg_06"></div> 
     <div class="bg_07"></div> 
     <div class="bg_08"></div> 
     <div class="bg_09"></div> 
     <div class="bg_10"></div> 
     <div class="bg_11"></div> 
     <div class="bg_12"></div> 
     <div class="bg_13"></div> 
     <div class="bg_14"></div> 
    </div> 
    <div class="main"> 
     <!-- 主体内容开始 --> 
     <img src="{{ asset('home/tuijian') }}/zt_02.jpg" border="0"> 
     <img src="{{ asset('home/tuijian') }}/zt_05.jpg" border="0"> 
     <img src="{{ asset('home/tuijian') }}/zt_08.jpg" border="0"> 
     <img src="{{ asset('home/tuijian') }}/zt_11.jpg" border="0"> 
     <img src="{{ asset('home/tuijian') }}/zt_14.jpg" border="0"> 
     <img src="{{ asset('home/tuijian') }}/zt_17.jpg" border="0"> 
     <img src="{{ asset('home/tuijian') }}/zt_20.jpg" border="0"> 
     <img src="{{ asset('home/tuijian') }}/zt_23.jpg" border="0"> 
     <img src="{{ asset('home/tuijian') }}/zt_26.jpg" border="0"> 
     <img src="{{ asset('home/tuijian') }}/zt_29.jpg" border="0"> 
     <img src="{{ asset('home/tuijian') }}/zt_32.jpg" border="0"> 
     <img src="{{ asset('home/tuijian') }}/zt_35.jpg" border="0"> 
  
   
     <!-- 主体内容结束 --> 
    </div> 
   </div> 
  </div> 
  <!-- 悬浮代码部分（不需要的部分可以注释掉或者删掉）start------------------------------------------- --> 
  <!-- 悬浮代码部分（不需要的部分可以注释掉或者删掉）start------------------------------------------- --> 
  <!-- 左悬浮代码部分start --> 
  <!--<div class="float" id="leftFloat">
    <ul>
        <li class="f-top"><a href="http://sale.suning.com/ju/jhsy1202/index.html" target="_blank">
            <img src="{ asset('home/tuijian/') }/img/b1g.png" ></a></li>
        <li class="col2"><a href="http://ju.suning.com/home.htm" target="_blank">大聚惠首页</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-2.htm#refresh" target="_blank" class="color2">3c数码</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-1.htm#refresh" target="_blank">大家电</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-17.htm#refresh" target="_blank">小家电</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-325.htm#refresh" target="_blank" class="color2">全球惠</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-10.htm#refresh" target="_blank" class="color2">食品</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-11.htm#refresh" target="_blank">居家</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-9.htm#refresh" target="_blank">母婴</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-8.htm#refresh" target="_blank" class="color2">美妆</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-4.htm#refresh" target="_blank"class="color2">男装</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-3.htm#refresh" target="_blank">女装</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-156.htm#refresh" target="_blank">内衣</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-6.htm#refresh" target="_blank" class="color2">运动</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-132.htm#refresh" target="_blank" class="color2">鞋包</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-7.htm#refresh" target="_blank">饰品</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-125.htm#refresh" target="_blank">家装</a></li>
        <li class=""><a href="http://ju.suning.com/column/cps-81.htm#refresh" target="_blank" class="color2">车品</a></li>
        <li class="sao"><img src="{ asset('home/tuijian/') }/img/p3gab.png"></li>
        <li class="backup"><a href="http://ju.suning.com/home.htm"  target="_blank">大聚惠首页<em></em></a></li>
    </ul>
</div>--> 
  <!-- 左悬浮代码部分end --> 
  <!-- 左悬浮代码部分end --> 
  <!-- 右悬浮代码部分start --> 
  <!-- <div class="float" id="rightFloat"> 
         <ul> 
          <li><a href="#f01" data-slow="f01" target="_self">羽绒服品牌</a></li> 
          <li><a href="#f02" data-slow="f02" target="_self">男装品牌</a></li> 
          <li><a href="#f02a" data-slow="f02a" target="_self">内衣品牌</a></li> 
          <li><a href="#f03" data-slow="f03" target="_self">鞋靴箱包品牌</a></li> 
          <li><a href="#f04" data-slow="f04" target="_self">MOSCHINO</a></li> 
          <li><a href="#f05" data-slow="f05" target="_self">Emporio Armani</a></li> 
          <li><a href="#f06" data-slow="f06" target="_self">PRADA</a></li> 
          <li class="f-up-top"><a href="#f00" data-slow="00" target="_self"><img src="{ asset('home/tuijian/') }/float/yd.png"></a> </li> 
         </ul> 
        </div> --> 
  <!-- 底悬浮代码部分start --> 
  <!-- <div id="bottomFloat">
<img src="{ asset('home/tuijian/') }/bFloatab1.gif" border="0" usemap="#Map333">

</div> --> 
  <!-- 底悬浮代码部分end --> 
  <!-- 回到顶部代码部分start --> 
  <!-- <div class="float" id="backTopFloat">
    <a href="#"><img src="{ asset('home/tuijian/') }/back_top.jpg"></a>
</div> --> 
  <!-- 回到顶部代码部分end --> 
  <!-- 悬浮代码部分end------------------------------------------------------------------------------ --> 
  <script type="text/javascript">
    var _virtualPath= "/促销/苏宁易购：心动潮牌 不必三思！限时秒杀！";
</script> 
  <script src="{{ asset('home/tuijian') }}/jquery.js"></script> 
  <script src="{{ asset('home/tuijian') }}/sa_click.js"></script> 
  <script type="text/javascript" src="{{ asset('home/tuijian') }}/lazyelem.js" charset="utf-8"></script> 
  <!-- 每次cps.js文件修改后请在这里修改下版本号v=20140804-1（ 修改日期-当日第几次） --> 
  <script src="{{ asset('home/tuijian') }}/common-min.js"></script> 
  <script src="{{ asset('home/tuijian') }}/snAction.js"></script> 
  <script>
// iDigger Tracking Codes
var _wmmq = _wmmq || [];
_wmmq.push( [ "db", "ifc" ] ,[ "sitecode", "T-000130-01" ]);
// 专题名称自行修改，一般与title相同
_wmmq.push( [ "tag", "双11来了 全球购机节" ]);

//****************************************
//这次新追加的代码
var _custno = "";
var _cookiesArray = document.cookie.split("; ");
for (var i = 0; i < _cookiesArray.length; i++) {
    var _cookieInfo = _cookiesArray[i].split("=");
    if (_cookieInfo[0] == "custno") {
        _custno = decodeURIComponent(_cookieInfo[1] ? _cookieInfo[1] : "");
        break;
    }
}
var _wmmq_custno = ["userid", _custno, "userflag", ""];
_wmmq.push(_wmmq_custno);
//****************************************

_wmmq.push( [ "_trackPoint" ] );

(function() {
    var ays = document.createElement('script');
    ays.type = 'text/javascript'; ays.async = true;
    ays.src = ('https:' == document.location.protocol ? 'https://2' : 'http://1') + '.allyes.com.cn/aywmq.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ays, s);
})();

// 滚屏控件start
    ;(function($){
        $.fn.snRoll = function(options){
            $.fn.snRoll.defaults = {

                timer: null,
                speed: 20,
                step: 1,
                pageWidth: 900,
                pageHeight: 40,
                auto: true,
                direction: 'next'

            }
            var opts = $.extend({},$.fn.snRoll.defaults,options);
            return this.each(function(index,obj){
                var _rollCoat = $(obj);
                var _rollBox = _rollCoat.find('.roll-box');
                var _rollContent = _rollCoat.find('.roll-content');
                var _rollList = _rollCoat.find('.roll-list');
                var _rollPrev = _rollCoat.find('.prev');
                var _rollNext = _rollCoat.find('.next');

                var pageWidth = opts.pageWidth;
                var pageHeight = opts.pageHeight;
                var speed = opts.speed;
                var step = opts.step;
                var timer = opts.timer;
                var auto = opts.auto;
                var direction = opts.direction;


                _rollContent.append(_rollList.clone().css('left',pageWidth));

                if (auto) {
                    timer = setInterval(function(){
                        play();
                    },speed);
                };

                function play(direction){
                    if (direction === 'prev') {
                        clearInterval(timer);

                        timer = setInterval(function(){
                                var left = parseInt(_rollContent.css('left'));
                                if (left >= 0) {
                                    _rollContent.css('left',-pageWidth);

                                }else{
                                    _rollContent.css('left',left+step);
                                }

                                
                            },speed);      
                    }else{
                        clearInterval(timer);

                        timer = setInterval(function(){
                            var left = parseInt(_rollContent.css('left'));
                            if (left <= -pageWidth) {
                                _rollContent.css('left',0);

                            }else{
                                _rollContent.css('left',left-step);
                            }  

                        },speed);                    
                    }
                };

                _rollCoat.hover(function(){
                    clearInterval(timer);
                },function(){
                    play(direction);
                });

                _rollPrev.click(function(){
                    direction = 'prev';
                    play(direction);
                });
                _rollNext.click(function(){
                    direction = 'next';
                    play(direction);
                })



            })        
        }


    })(jQuery);
    // 滚屏控件end
  // 轮播控件脚本代码start
    ;(function($){
        $.extend($.easing,{
            easeInQuad: function (x, t, b, c, d) {
                return c*(t/=d)*t + b;
            }            
        });

        $.fn.snSlide = function(options){

            var opts = $.extend({},$.fn.snSlide.defaults,options);
            return this.each(function(){
                var slide = $(this);

                var btnL = slide.find(".prev");
                var btnR = slide.find(".next");
                var _move = slide.find(".content");
                var nums = slide.find(".nums");
                var picBox = slide.find(".box");
                var scrollContent = slide.find(".content");
                var page = slide.find(".page");

                var pageWidth = opts.pageWidth;
                var pageHeight = opts.pageHeight;
                var pageCount = opts.pageCount;
                var interval = opts.interval;
                var delay = opts.delay;
                var speed = opts.speed;
                var auto = opts.auto;
                var easing = opts.easing;
                var pageNumWidth = opts.pageNumWidth;

                var timer = null;

                var init = function(){
                    var numsWidth = (pageNumWidth+4)*pageCount;
                    nums.css({'width':numsWidth,'marginLeft':-numsWidth/2});
                    picBox.css({'width':pageWidth,'height':pageHeight});
                    scrollContent.css({'width':pageWidth*pageCount*2,'left':-pageWidth*pageCount});
                    page.css({'width':pageWidth,'height':pageHeight});

                    scrollContent.append(scrollContent.html());

                };

                if (auto) {
                    timer = setInterval(move,interval);
                    slide.hover(function(){
                        clearInterval(timer);
                    },function(){
                        timer = setTimeout(function(){timer = setInterval(move,interval);},delay);                       
                    });                    
                };

                btnR.click(function(){
                    _move.stop().animate({left:[-pageWidth*(pageCount+1),easing]},speed,function(){
                        var lis = _move.find(".page");
                        _move.append(lis.eq(0).clone());
                        lis.eq(0).remove();
                        _move.css({left:-pageWidth*pageCount});
                        lightNum();
                    })
                })
                btnL.click(function(){
                    _move.stop().animate({left:[-pageWidth*(pageCount-1),easing]},speed,function(){
                        var lis = _move.find(".page");
                        var lastPageIndex = pageCount*2 -1;
                        _move.prepend(lis.eq(lastPageIndex).clone());//这里的eq值等于page*2-1
                        lis.eq(lastPageIndex).remove();
                        _move.css({left:-pageWidth*pageCount});
                        lightNum();
                    })
                });

                function move(){
                    _move.stop().animate({left:[-pageWidth*(pageCount+1),easing]},speed,function(){
                        var lis = _move.find(".page");
                        _move.append(lis.eq(0).clone());
                        lis.eq(0).remove();
                        _move.css({left:-pageWidth*pageCount});
                        lightNum();

                    })
                };
                function lightNum(){                   
                    var activePageNum = slide.find('.page').eq(pageCount).attr('data-page');
                    slide.find('.nums').find('li').eq(activePageNum-1).addClass('on').siblings().removeClass('on');

                };

                slide.find('.num').click(function(){
                    var _this = $(this);
                    var toPageNum = _this.index()+1;
                    var fromPageNum = slide.find('.page').eq(pageCount).attr('data-page');
                    var left = -pageWidth*pageCount - (toPageNum - fromPageNum)*pageWidth;
                    _this.addClass('on').siblings().removeClass('on');
                    _move.stop().animate({left:[left,easing]},speed,function(){                           

                    })            

                });

                init();


            });

        };
        // 默认参数
        $.fn.snSlide.defaults = {
            pageWidth: 1000,
            pageHeight: 530,    
            pageCount: 3,
            interval: 3000,
            delay: 5000,
            speed: 500,
            auto: true,
            easing: 'easeInQuad',
            pageNumWidth: 12         
        }
    })(jQuery);
// 轮播控件脚本代码end


// iDigger Tracking Codes
    // 当页面加载完成执行相关脚本start----------------------------------------------------------------------------------------------
   $(function(){   

        $(window).scroll(function(){
            var topHide = $(document).scrollTop(); //页面上部被卷去高度
            var windowHeight = $(window).height();  //窗口可视区域高度
            var bottomFloatHeight = $('#bottomFloat').height(); //底悬浮高度
            var backTopFloatHeight = $('#backTopFloat').height();
            var bottomTop = windowHeight+topHide-bottomFloatHeight;
            var backTop = windowHeight+topHide-backTopFloatHeight-20;

            //针对IE6不支持fixed的处理start          
            if ($.browser.msie && ($.browser.version == "6.0") && !$.support.style) {
                $('#bottomFloat').stop().animate({'top':bottomTop},'fast');
                $('#backTopFloat').stop().animate({'top':backTop},'fast');
            }            
            //针对IE6不支持fixed的处理end
           
             //滚动渐隐渐现左右悬浮start         
          if(topHide>300){               
         $('#leftFloat').show();               
          $('#rightFloat').show();               
           $('#backTopFloat').show();            
           }else{               
            $('#leftFloat').hide();                 
          $('#rightFloat').hide();                 
          $('#backTopFloat').hide();           
           }            
           //滚动渐隐渐现左右悬浮end       
          
       // 轮播控件脚本代码start
    ;(function($){
        $.fn.snTab = function(options){

            var opts = $.extend({},$.fn.snTab.defaults,options);
            return this.each(function(){
                var tab = $(this);

                var tab_btns = tab.find(".tab-btns");
                var tab_btn = tab_btns.find(".tab-btn");
                var tab_pane_box = tab.find(".tab-pane-box");
                var tab_panes = tab_pane_box.find(".tab-panes");
                var tab_pane = tab_panes.find(".tab-pane");

                var btnWidth = opts.btnWidth;
                var btnHeight = opts.btnHeight;
                var paneWidth = opts.paneWidth;
                var paneHeight = opts.paneHeight;
                var paneCount = opts.paneCount;

                var timer = null;

                var init = function(){
                  tab_btns.css({'width':btnWidth*paneCount,'height':btnHeight});
                  tab_btn.css({'width':btnWidth,'height':btnHeight});
                    tab_pane_box.css({'width':paneWidth,'height':paneHeight});
                    tab.css({'width':paneWidth,'height':paneHeight+btnHeight});
                };

                tab_btn.hover(function(){
                    var $this = $(this);
              var index = $this.index();
                    $this.addClass('on').siblings().removeClass('on');
              tab_pane.eq(index).addClass('on').siblings().removeClass('on');                 
                })

                init();

            });

        };
        // 默认参数
        $.fn.snTab.defaults = {
          btnWidth: 500,
          btnHeight: 50,
            paneWidth: 1000,
            paneHeight: 98,    
            paneCount: 5      
        }
    })(jQuery);
// 轮播控件脚本代码end


// 抽屉拉伸开始
   $('.coat').find('.pic').hover(function(){
            var _this = $(this);
            setTimeout(function(){_this.stop().animate({'width':'680px','opacity':'1'},'fast','linear').siblings().stop().animate({'width':'160px','opacity':'1'},'fast','linear');},200);            
            
        })
  
    // 抽屉拉伸结束


   $('#tab_1').snTab({'btnWidth':330,'btnHeight':60,'paneWidth':990,'paneHeight':850,'paneCount':3}); 
    $('#tab_2').snTab({'btnWidth':250,'btnHeight':83,'paneWidth':1000,'paneHeight':531,'paneCount':4});
        });

        $('.temp-cp').hover(function(){
            $(this).toggleClass('on');
        })
    
    
     $("a[name1^=sale_dajuhui_]").live("click",function(){
           try {
             console.log(sa);
             sa.click.sendDatasIndex(this,'name1');
           } catch(e){
           }
         });

    
    
    
    
    
    
      // 图片高亮脚本开始 
    $('#tiqian').find('.piece').hover(function(event){
          $(this).removeClass('other').siblings().addClass('other');
      },function(){
          $('#tiqian').find('.piece').removeClass('other');
      })
        // 图片高亮脚本结束  
    
    
    

        // 模板数据填充脚本开始
        bindData(cps);
        // 模板数据填充脚本结束   

    });
  
  
  
  
  
     //滚屏控件调用
        $('.roll-coat').snRoll({'pageWidth':2280,'pageHeight':88,'speed':8,'step':1,'auto':true});
    //滚屏控件结束
    
    
    
   // 轮播脚本引用 start
      
        $('#slide_1').snSlide({'pageWidth':463,'pageHeight':530,'pageCount':16,'pageNumWidth':3});
        // 轮播脚本引用 end    

    // 当页面加载完成执行相关脚本end----------------------------------------------------------------------------------------------       
</script> 
  <!-- 分享按钮 --> 

</body></html>
@endsection