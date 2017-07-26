@extends('home.userlout')

@section('content')
<link rel="stylesheet" href="{{ asset('home/comment/index.css') }}">
<link rel="stylesheet" href="{{ asset('home/comment/message.css') }}">
<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box">
            <div style="float-left" class="box-hd">
                <a href="{{ url('home/talk/list') }}"><h1 style="font-size:16px" class="title">作为卖家收到的信息</h1></a>
            </div>
            <div style="float-right" class="box-hd">
                <a href="{{ url('home/talkback/list') }}"><h4 style="font-size:16px" class="title">作为买家收到的信息</h4></a>
            </div>
            
            <script>
                $('.title').on('mouseover',function(){
                    $(this).css('color','#E99420');
                });

                $('.title').on('mouseout',function(){
                    $(this).css('color','#ccc');
                });
            </script>
             <div class="contain">
                <div class="wrap">
                    @if(!$date)
                        <div class="box-bd">
                            <p class="empty">您暂评论消息。</p>
                            <div class="xm-pagenavi"></div>  
                        </div>
                    @endif
                    
                    @if($data)
                    @foreach($data as $v)
                        <div class="messagecon" style="padding:0px;marfin:0px;">
                            <ul>
                                <li>
                                    
                                        <a class="head"><img src="{{ asset('/uploads/user') }}/{{ $v->photo }}"></a>
                                  
                                    <div>
                                        <a href=""><p> &nbsp;</p>{{ $v->nickname }}</a>
                                        <p class="msg">
                                            <a class="head" href="{{ url('home/details') }}/{{ $v->id }}" ><img src="{{ asset('/uploads/shop') }}/{{ $v->pic }}"></a>
                                            商品名称:&nbsp;&nbsp;<span class="time">{{ $v->name }}</span><br/>
                                            消息内容:&nbsp;&nbsp;<span class="time">{{ $v->content }}</span>
                                        </p>
                                        
                                     
                                       
                                    </div>

                                </li>
                            </ul>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
            {{ $data->links('vendor.pagination.simple-default', ["max" => $max]) }}
            

        </div>
    </div>
</div>
      
    </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('home/address/user.min.js') }}"></script>

@endsection