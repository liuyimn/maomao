@extends('home.layout')
@section('content')
<title>猫猫二手商城-拍卖商品添加</title>
<link rel="stylesheet" href="/home/auction/jquery-ui-1.9.1.custom.d3ae8ca1.css" onerror="tracker.resErr(this)">
</head>
<style>
.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
    width: 99px;
    height: 35px;
    line-height: 34px;
    font-weight: bold;
    font-size: 9px;
    color: #ccc;
}
.fileUpload input.upload {  
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
}
</style>
<body> <!--<![endif]-->
<div class="wrapper">
<div class="clearfix">
  <div id="publish" class="publish-detail">
    <div class="separate">猫猫二手商城-拍卖商品添加
  </div>
  <form action="{{ url('/home/auction/insert') }}" method="post" enctype="multipart/form-data" class="form zengsong ershou">
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
      <div class="p-line">
        <label class="p-label">
              <span class="required">*</span>商品标题：
        </label>
        <div class="publish-detail-item">
              <input type="text" name="name" value="{{ old('name') }}" maxlength="18" class="input-6 input">
        </div>
      </div>
      
      <div class="p-line">
        <label class="p-label">现价: </label>
          <div class="publish-detail-item">
            <input type="text" name="newpage" value="{{ old('newpage') }}" maxlength="5" class="input-6 input">元
          </div>
      </div>
      <div class="p-line">
        <label class="p-label">原价: </label>
          <div class="publish-detail-item">
            <input type="text" name="oldpage" value="{{ old('oldpage') }}" maxlength="5" class="input-6 input">元
          </div>
      </div>
      <div class="p-line">
        <label class="p-label">拍卖持续时间: </label>
          <div class="publish-detail-item">
            <input type="text" name="endtime" value="{{ old('endtime') }}" maxlength="2" class="input-6 input">分钟
          </div>
      </div>
     
      <div class="p-line">
          <label class="p-label">
            <span class="required">*</span>商品描述：
          </label>
          <div class="publish-detail-item">
            <textarea class="input" name="content" value="{{ old('content') }}" maxlength="5000" size="5" style="resize:none; word-wrap: break-word; height: 115px;">
            </textarea>
          </div>
      </div>
      <div class="p-line swfu" id="id_images">
        <label  class="p-label">封面照片：</label>
            <div style="background:#337AB7;border:0px;" class="fileUpload btn btn-primary">
              <span>上传拍卖图片</span>
              <input type="file" class="upload" />
            </div>
      </div>
    </div>
      <p class="p-submit 0">
      <input type="submit" value="免费发布" id="fabu-form-submit" style="background:#337AB7;border:0px;" class="form-submit button button-green">
      </p>
  </form>
  </div>
</div>
</div>
@endsection

