@extends('home.userlout')

@section('content')

                <div class="span16" >
                    <div class="uc-box uc-main-box" style="height:750px;" >
                        <div class="uc-content-box">
                            <div class="box-hd">
                                <h1 class="title">添加收货地址</h1>
                            </div>
                                <div class="box-bd" >
                                    <form action="{{ url('home/address/insert') }}" method="post">
                                        <div class="modal-body">
                                            <div class="form-box clearfix">
                                                @if(session('info'))
                                                  <div class="alert alert-danger">
                                                    {{ session('info') }}
                                                  </div>
                                                  @endif
                                                  @if (count($errors) > 0)
                                                    <div class="alert alert-danger">
                                                      <ul>
                                                        @foreach($errors->all() as $error)
                                                          <li>{{ $error }}</li>
                                                        @endforeach
                                                      </ul>
                                                    </div>
                                                  @endif
                                                <div class="form-section form-name">
                                                    <label class="input-label" for="user_name">姓名</label>
                                                    <input class="input-text J_addressInput" type="text" name="name" value="{{ old('name') }}" placeholder="收货人姓名">
                                                    {{ csrf_field() }}
                                                </div>
                                                <div class="form-section form-phone">
                                                    <label class="input-label" for="user_phone">手机号</label>
                                                    <input class="input-text J_addressInput" type="text" name="phone" value="{{ old('phone') }}" placeholder="11位手机号">
                                                </div>
                                                <div style="border:0px;" class="form-section form-four-address form-section-active">
                                                    <fieldset  id="city_china_val">
                                                            <p>所在地区：
                                                            <select name="addressa" class="province cxselect" data-value="" data-first-title="选择省" disabled="disabled"></select>
                                                            <select name="addressb" class="city cxselect" data-value="" data-first-title="选择市" disabled="disabled"></select>
                                                            <select name="addressc" class="area cxselect" data-value="" data-first-title="选择地区" disabled="disabled"></select>
                                                        </p>
                                                    </fieldset>
                                                </div>
                                                <div class="form-section form-address-detail">
                                                    <label class="input-label" for="user_adress">详细地址</label>
                                                    <textarea style="resize:none;" class="input-text J_addressInput" type="text" name="user_adress" placeholder="详细地址，路名或街道名称，门牌号">{{ old('user_adress') }}</textarea>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">保存</button>
                                            <a href="{{ url('home/address/index') }}" class="btn btn-gray" >取消</a>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- .modal-globalSites END -->
<script src="{{ asset('home/address/base.min.js') }}"></script>


<script type="text/javascript" src="{{ asset('home/address/address.min.js') }}"></script>
            
<script src="{{ asset('home/address/jquery-1.8.3.min.js') }}"></script>

<script src="{{ asset('home/address/js/jquery.cxselect.min.js') }}"></script>

<script>
$.cxSelect.defaults.url = '/home/address/js/cityData.min.json';

$('#city_china').cxSelect({
    selects: ['province', 'city', 'area']
});

$('#city_china_val').cxSelect({
    selects: ['province', 'city', 'area'],
    nodata: 'none'
});
</script>
@endsection