@extends('home.userlout')

@section('content')

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