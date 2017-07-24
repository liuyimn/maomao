@extends('home.userlout')

@section('content')

<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box">
            <div class="box-hd">
                <h1 class="title">我的积分</h1>
            </div>
                
                
            <div class="address-item J_addressItem" style="width:200px;height:50px;">
                <dl>
                    <dt>
                    <em class="utel" style="text-align:center;"><b>我的积分</b>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{ $num }}</b></em>
                    </dt>
                </dl>
             </div>
                
                @if(empty($data) | empty($max))
                 <div class="box-bd">
                    <p class="empty">您暂无新加入的积分。</p>
                    <div class="xm-pagenavi"></div>  
                </div>
                @else
                <div class="xm-exchange-content mail" data-class="mail" style="width:100%;margin-top:20px;">
                    <div class="text mail">
                        <div class="exchange_bd">
                            <table>
                                <thead>
                                    <tr>
                                        <th>订单号</th>
                                        <th>加入积分</th>
                                        <th>时间</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $val)
                                    <tr>
                                    <th>{{ $val->num }}</th>
                                    <td>{{ round($val->page * 0.1) }}</td>
                                    <td>{{ $val->time }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            {{ $data->links('vendor.pagination.simple-default', ["max" => $max]) }}
            @endif
        </div>
    </div>
</div>
</div>
</div>
</div>

@endsection