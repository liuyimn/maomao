@extends('home.layout')
@section('content')
<title>猫猫二手商城-拍卖商品添加</title>
<!-- <link rel="stylesheet" href="/home/auction/index.34eb422c.css" onerror="tracker.resErr(this)">
<link rel="stylesheet" href="/home/auction/baicons2.1657e729.css"> -->
<link rel="stylesheet" href="/home/auction/jquery-ui-1.9.1.custom.d3ae8ca1.css" onerror="tracker.resErr(this)">
<style type="text/css">

.webuploader-container {
	position: relative;
}
.webuploader-element-invisible {
	position: absolute !important;
	clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
	clip: rect(1px,1px,1px,1px);
}
.webuploader-pick {
	position: relative;
	display: inline-block;
	cursor: pointer;

	overflow: hidden;
}
.webuploader-pick-hover {
	/*background: #00a2d4;*/
}

.webuploader-pick-disable {
	opacity: 0.6;
	pointer-events:none;
}

/*
 hack: 在选择文件按钮渲染并可见之前就实例化uploader会导致透明的flash按钮过小
 */
.webuploader-pick + div {
	left: 0 !important;
	top: 0 !important;
	width: 100% !important;
	height: 100% !important;
}
</style>
<style type="text/css">
.img-uploader-legacy-picker-container {

  width: 115px;
  height: 28px;
  margin-right: 0.5em;
  border: 1px solid #ccc;
  background: #fafafa;
  border-radius: 3px;
  color: #666;
  cursor: pointer;
  font-size: 12px;
  line-height: 26px;
  text-align: center;
}
.img-uploader-legacy-picker-container:hover {
  background: #eee;
}
.uploader-disabled .postimg-item-status,
.uploader-disabled .img-uploader-picker-container {
  display: none !important;
}
.uploader-disabled li.postimg-item:after {
  content: '\5BA1\6838\4E2D';
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  padding-top: 50px;
  background: #fff;
  opacity: 0.7;
  text-align: center;
}
</style>
</head><!--[if lt IE 7 ]> <body class="ie6 lt-ie8"> <![endif]--><!--[if IE 7 ]>    <body class="ie7 lt-ie8"> <![endif]--><!--[if IE 8 ]>    <body class="ie8 "> <![endif]--><!--[if (gte IE 9)|!(IE)]><!--> 
<body> <!--<![endif]-->
<div class="wrapper">
<div class="clearfix">
  <div id="publish" class="publish-detail">
    <div class="separate">猫猫二手商城-拍卖商品添加
  </div>
  <form id="bxForm" action="{{ url('/home/auction/insert') }}" method="post" style="" enctype="multipart/form-data" class="form zengsong ershou">
     {{ csrf_field() }}
    <div class="fabuform-tab-content">
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
      <div class="p-line" id="id_title">
        <label class="p-label">
              <span class="required">*</span>商品标题：
        </label>
        <div class="publish-detail-item">
              <input type="text" name="name" value="{{ old('name') }}" maxlength="25" class="input-60 input">
        </div>
      </div>
      <div class="p-line" id="id_content">
          <label class="p-label">
            <span class="required">*</span>商品描述：
          </label>
          <div class="publish-detail-item">
            <textarea class="input" name="content" value="{{ old('content') }}" maxlength="5000" size="5" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 115px;">
            </textarea>
          </div>
      </div>
      <div class="p-line" id="">
        <label class="p-label">现价: </label>
          <div class="publish-detail-item">
            <input type="text" name="oldpage" value="{{ old('oldpage') }}" maxlength="32" class="input-6 input">元
          </div>
      </div>
      <div class="p-line" id="">
        <label class="p-label">原价: </label>
          <div class="publish-detail-item">
            <input type="text" name="newpage" value="{{ old('newpage') }}" maxlength="32" class="input-6 input">元
          </div>
      </div>
      <div class="p-line" id="">
        <label class="p-label">拍卖持续时间: </label>
          <div class="publish-detail-item">
            <input type="text" name="endtime" value="{{ old('endtime') }}" maxlength="32" class="input-6 input">小时
          </div>
      </div>
      <div class="p-line swfu" id="id_images">
        <label class="p-label">封面照片：</label>
        <div class="publish-detail-item">
          <div class="imgx-container clearfix">
              <div class="clearfix">
                  <div class="pull-left img-uploader-picker-container imgx-btn-group webuploader-container">
                    <div class="webuploader-pick">
                      <div class="imgx-btn">
                        <span class="imgx-label">上传照片</span>
                      </div>
                    </div>
                    <div id="rt_rt_1bkl437roabqousk8kgri1bvn1" style="position: absolute; top: 0px; left: 0px; width: 110px; height: 42px; overflow: hidden; bottom: auto; right: auto;">
                        <input type="file" name="pic" multiple="multiple" accept="image/jpeg, image/jpg, image/png">
                    </div>
                  </div>
                  <div class="jsUploader imgx-btn-group hide pull-left">
                      <iframe src="./home/auction/js_uploader.html" frameborder="0" width="124" height="44" scrolling="no"></iframe>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
      <p class="p-submit 0">
      <input type="submit" value="免费发布" id="fabu-form-submit" data-m-check="" class="form-submit button button-green">
      </p>
      <div id="formsubmittips" class="small p-submit 0">
          <input type="checkbox" id="agreement" name="agreement" checked="">本人已仔细阅读并同意&nbsp;
          <a target="_blank" href="#">用户服务协议</a>&nbsp;和&nbsp;
          <a target="_blank" href="#">公约</a>
      </div>
  </form>
  </div>
</div>
</div>
@endsection

