@extends('home.userlout')

@section('content')
<link rel="stylesheet" href="{{ asset('home/comment/index.css') }}">
<link rel="stylesheet" href="{{ asset('home/comment/message.css') }}">
<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box">
            <div class="box-hd">
                <h1 class="title">评论</h1>
            </div>
             <div class="contain">
                <div class="wrap">
                    @if(empty($data))
                        <div class="box-bd">
                            <p class="empty">您暂无评论。</p>
                            <div class="xm-pagenavi"></div>  
                        </div>
                    @else
                        @foreach($data as $val)
                        <div class="messagecon" style="padding:0px;marfin:0px;">
                            <ul>
                                <li>
                                    <a class="head" href="{{ url('home/details') }}/{{$val->sid}}" ><img src="{{ asset('uploads/shop') }}/{{ $val->pic }}"></a>
                                    <div>
                                        <a href="{{ url('home/details') }}/{{$val->sid}}"><p>{{ $val->name }} &nbsp;</p></a>
                                        <p class="msg">评论内容:&nbsp;&nbsp;<span class="time">{{ $val->content }}</span></p>
                                        <p class="msg">评论时间:&nbsp;&nbsp;<span class="time">{{ date('Y-m-d H:i:s', $val->ptime) }}</span></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    {{ $data->links('vendor.pagination.simple-default', ["max" => $max]) }}
                    @endif
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