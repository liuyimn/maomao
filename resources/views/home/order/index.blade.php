@extends('home.userlout')

@section('content')

<div class="span16">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box">
            <div class="box-hd">
                <h1 class="title">我的订单</h1>
                <div class="more clearfix hide">
                    <ul class="filter-list J_addrType">
                        <li class="first active">卖出的商品</li>
                    </ul>
                </div>
            </div>
            @if(empty($data) | empty($w))
                <div class="box-bd">
                    <p class="empty">您暂无订单。</p>
                    <div class="xm-pagenavi"></div>  
                </div>
            @else
            <div class="xm-exchange-content mail" data-class="mail" style="padding:0px;width:100%;">
                <div class="text mail">
                    <div class="exchange_bd">
                        <table>
                        <thead>
                            <tr>
                                <th>订单号</th>
                                <th>商品名称</th>
                                <th>商品总价</th>
                                <th>送货地址</th>
                                <th>商品状态</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $val)
                            <tr>
                            <th>{{ $val->num }}</th>
                            <td>
                                @foreach($w as $v)
                                    @foreach($v as $r)
                                        {{ mb_substr($r->name, 0,9).'...' }}
                                    @endforeach
                                @endforeach
                            </td>
                            <td>{{ $val->page }}</td>
                            <td>{{ mb_substr($val->address, 0, 8).'...' }}</td>
                            
                            <td>{{ $arr[$val->status] }}</td>
                            
                            </tr>
                            @endforeach

                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

            
        </div>
    </div>
</div>
</div>
</div>
</div>

@endsection