<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>{{ config('app.name') }}</title>
<link type="text/css" rel="stylesheet" href="{{ asset('home/gr/reset.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('home/gr/layout.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('home/gr/modacctip.css') }}">
<style>
  /*a  upload */
.a-upload {
    padding: 4px 10px;
    height: 20px;
    line-height: 20px;
    position: relative;
    cursor: pointer;
    color: #888;
    background: #fafafa;
    border: 1px solid #ddd;
    border-radius: 4px;
    overflow: hidden;
    display: inline-block;
    *display: inline;
    *zoom: 1
}

.a-upload  input {
    position: absolute;
    font-size: 100px;
    right: 0;
    top: 0;
    opacity: 0;
    filter: alpha(opacity=0);
    cursor: pointer
}

.a-upload:hover {
    color: #444;
    background: #eee;
    border-color: #ccc;
    text-decoration: none;

}
</style>
</head>
<body class="zh_CN">
	<div class="popup_mask" style="display: none;" id="loadingMask">
		<div class="bkc"></div>
		<div class="mod_wrap loadingmask">
			
		</div>
	</div>
  <div class="wrapper blockimportant">
  <div class="wrap">
<div class="layout bugfix_ie6 dis_none">
  <div class="n-logo-area clearfix">
      <a id="logoutLink" class="fl-r logout" href="{{ url('home/user/index') }}">
          退出
      </a>
  </div>
  
    <!--头像 名字-->
	<div class="n-account-area-box">
		<div class="n-account-area clearfix">
		  <div class="na-info">
			<p class="na-name">        {{ $data->nickname }}</p>
		  </div>
		  <div class="na-img-area fl-l">
      <!--na-img-bg-area不能插入任何子元素-->
      <div class="na-img-bg-area">
        <img src="{{ asset('uploads/user') }}/{{ $data->photo }}">
      </div>
		  </div>
		</div>
	</div>
  
</div>

	<div class="layout">
      <div class="n-main-nav clearfix">
        <ul>
          <li class="current">
            <a style="color:#888;">个人信息</a>
            <em class="n-nav-corner"></em>
          </li>
        </ul>
      </div>
      <div class="n-frame">
<form action="{{ url('home/userdetail/update') }}" method="post" enctype="multipart/form-data">
    <div class="uinfo c_b">
        <div class="">
        <div class="main_l">
          <div class="naInfoImgBox t_c">
            <div class="na-img-area marauto">
              <!--na-img-bg-area不能插入任何子元素-->
              <div class="na-img-bg-area">
                <img src="{{ asset('uploads/user') }}/{{ $data->photo }}">
              </div>
              <em class="na-edit"></em>
            </div>
            <div class="naImgLink">
              <a href="javascript:;" class="a-upload">
                <input type="file" name="photo" id="">点击这里上传文件
              </a>
              {{ csrf_field() }}
            </div>
          </div>        
        </div>
        <div class="main_r">
          <div class="framedatabox">
            <div class="fdata">
              <h3>基础资料</h3>            
            </div>
            <div class="fdata lblnickname">
              <p><span>昵称：</span>
              <input type="text" autocomplete="off" name="nickname" value="{{ $data->nickname }}">
              </p>     
            </div>
            <div class="fdata lblbirthday">
              <p>
              <span>生日：</span>
                <select name="year" id="sel1">
                    <option value="@if($year){{ $year }}@else 1990 @endif">@if($year){{ $year }}@else 1990 @endif</option>
                </select>
                <select name="month" id="sel2">
                    <option value="{{ $month }}">{{ $month }}</option>
                </select>
                <select name="day" id="sel3">
                    <option value="{{ $day }}">{{ $day }}</option>
                </select>
                <span id="result"></span>
                </p>
            </div>
            <div class="fdata lblgender">
              <p><span>性别：</span>
                <select name="sex">
                  @if($data->sex == 'm')
                  <option value="m" selected="selected">男</option>

                  <option value="w">女</option>
                  @else 
                  <option value="m" >男</option>

                  <option value="w" selected="selected">女</option>
                  @endif
                </select>
              </p>     
            </div>
            <div class="fdata lblnickname">
              <p><span>邮箱：</span>
              <input type="email" disabled="disabled" autocomplete="off" name="email" value="{{ $data->email }}">
              </p>     
            </div>
            <div class="fdata lblnickname">
              <p><span>     q   q          ：</span>
                <input name="qq" autocomplete="off" type="text" value="{{ $data->qq }}">
              </p>     
            </div>
                <button type="submit" style="color: #888;width:70px;height:30px;margin-top:50px;margin-left:100px;background:#fafafa;cursor: pointer; border: 1px solid #ddd;">保存</button>
          </div>
        </div>
       
        </div>
	        
  </div>
  </form>
	 </div>
	</div>
  </div>
  </div>
	
<script src="{{ asset('/home/gr/jquery-1.8.3.min.js') }}"></script>
<!-- <script src="{{ asset('/home/gr/placeholder.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('/home/gr/birthday.js') }}"></script>
<script type="text/javascript" src="{{ asset('/home/gr/jquery.js') }}"></script>
<script>
    //生成1900年-2100年
    for(var i = 1970; i<=2100;i++){
        var option = document.createElement('option');
        option.setAttribute('value',i);
        option.innerHTML = i;
        sel1.appendChild(option);
    }
    //生成1月-12月
    for(var i = 1; i <=12; i++){
        var option = document.createElement('option');
        option.setAttribute('value',i);
        option.innerHTML = i;
        sel2.appendChild(option);    
    }
    //生成1日—31日
    for(var i = 1; i <=31; i++){
        var option = document.createElement('option');
        option.setAttribute('value',i);
        option.innerHTML = i;
        sel3.appendChild(option);    
    }
 
</script>


</body>
</html>