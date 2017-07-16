@extends('home.layout')
@section('content')
<title>猫猫二手商城-拍卖商品添加</title>
<!-- <link rel="stylesheet" href="/home/auction/index.34eb422c.css" onerror="tracker.resErr(this)"> -->
<!-- <link rel="stylesheet" href="/home/auction/baicons2.1657e729.css"> -->
<link rel="stylesheet" href="/home/auction/jquery-ui-1.9.1.custom.d3ae8ca1.css" onerror="tracker.resErr(this)">
<script src="{{ asset('/home/index/bootstrap/jquery.cxselect.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('/home/index/bootstrap/bootstrap.min.css') }}">

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

.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
 
.fileUpload input.upload {  position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}

</style>
</head><!--[if lt IE 7 ]> <body class="ie6 lt-ie8"> <![endif]--><!--[if IE 7 ]>    <body class="ie7 lt-ie8"> <![endif]--><!--[if IE 8 ]>    <body class="ie8 "> <![endif]--><!--[if (gte IE 9)|!(IE)]><!--> 
<body> <!--<![endif]-->
<div class="wrapper">
<div class="clearfix">
  <div id="publish" class="publish-detail">
    <div class="separate">猫猫二手商城-发布商品
  </div>
  <form id="bxForm" action="{{ url('/home/addshop/insert') }}" method="post" style="" enctype="multipart/form-data" class="form zengsong ershou">
     {{ csrf_field() }}
    <div class="fabuform-tab-content">
      <div class="p-line" id="id_title">
        <label class="p-label">
              <span class="required">*</span>商品名称：
        </label>
        <div class="publish-detail-item">
            <span id="spanone" style="display:none;color:red"></span>
              <input type="text" id="name" name="name" value="" maxlength="25" class="input-60 input"> 
        </div>
      </div>
       <div class="p-line" id="">
        <label class="p-label">原价: </label>
          <div class="publish-detail-item">
            <span id="spantwo" style="display:none;color:red;"></span>
            <input type="text" id="oldpage" name="oldpage" value="" maxlength="32" class="input-6 input">元
          </div>
      </div>
      <div class="p-line" id="">
        <label class="p-label">现价: </label>
          <div class="publish-detail-item">
            <span id="spanthree" style="display:none;color:red;"></span>
            <input type="text" id="newpage" name="newpage" value="" maxlength="32" class="input-6 input">元
          </div>
      </div>
   
      <div class="p-line" id="">
        <label class="p-label">商品分类: </label>
            <div id="did" class="publish-detail-item">
            <span id="spanfour" style="display:none;color:red;"></span>
                <select id="sel1">
                    <option value="">-请选择分区-</option>
                    @foreach($res as $k => $v)
                    <option value="{{ $v->id }}">{{ $v->name }}</option>
                    @endforeach
                </select>
            </div>
      </div>
      <div class="p-line" id="">
        <label class="p-label">您的位置: </label>
          <div class="publish-detail-item">
            <span id="spanfive" style="display:none;color:red;"></span>
            <fieldset id="city_china_val">
              <select id="province" name="province" class="province cxselect" data-value="" data-first-title="选择省" disabled="disabled"></select>
              <select id="city" name="city" class="city cxselect" data-value="" data-first-title="选择市" disabled="disabled"></select>
              <select id="area"  name="area" class="area cxselect" data-value="" data-first-title="选择地区" disabled="disabled"></select>
          </fieldset>
          </div>
      </div>
            <div class="p-line" id="id_content">
          <label class="p-label">
            <span class="required">*</span>商品描述：
          </label>
          <div class="publish-detail-item">
            <textarea class="input" name="connect" value="" maxlength="5000" size="5" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 115px;">
            </textarea>
          </div>
      </div>
      <div class="p-line swfu" id="id_images">
        <label class="p-label">封面照片：</label>
            <div class="fileUpload btn btn-primary">
          <span>商品图片</span>
          <input type="file" name="pic" class="upload" />
        </div>
      </div>
    </div>
      <p class="p-submit 0">
      <input type="submit" style="background-color:#337AB7;border:0px" value="发布" id="fabu-form-submit"  class="form-submit button button-green">
      </p>
      
  </form>
  </div>
</div>
</div>
<script>

$.cxSelect.defaults.url = '/home/index/bootstrap/cityData.min.json';

$('#city_china_val').cxSelect({
  selects: ['province', 'city', 'area'],
  nodata: 'none'
});

//定义初始状态
var namespan = false;
var olds = false;
var news = false;
var typespan = false;


$('#sel1').live('change',function(){
    
    $(this).nextAll('select').remove();
    //获取当前点击的val值
    var val = $(this).val();

    if(val){
        //查询所有父分类
        $.ajax('/home/addshop/ajaxone',{
            type:'GET',
                data:{pid:val},
                dataType:'json',
                success:function(data){
                    
                    //创建一个select框
                    var select = $('<select id="sid"><option value="">-请选择分区-</option></select>'); 

                    //添加到页面
                    $('#did').append(select);
                    
                    //循环迭代数据
                     for(var i = 0; i < data.length; i++){
                        
                        //迭代创建option标签数据
                        option = $('<option value="'+ data[i]['id'] +'">'+ data[i]['name'] +'</option>'); 

                        //添加到创建的select框中
                        $('select').eq(1).append(option);
                     
                    }        
                //返回错误信息
                },error:function(){
                    alert('数据异常');
                }
        });
    }else{
        $('#spanfour').css('display','block').html('请选择完整的分区');
    }

});

$('#sid').live('change',function(){

    //重选清空
    $(this).nextAll('select').remove();

    //获取id
    var num = $(this).val();

    //判断value是否有值
    if(num){

        //修改状态
        typespan = true;

        //样式恢复
        $('#spanfour').html('').css('display','none');

        //发送ajax
        $.ajax('/home/addshop/ajaxtwo',{
            type:'GET',
                data:{pid:num},
                    dataType:'json',
                    success:function(data){
                        
                        //判断是否存在返回值
                        if(data.length > 0){

                            //设置一个select
                            var selects = $('<select name="tid" id="uid"></select>'); 

                            //添加到页面
                            $('#did').append(selects);

                            //遍历迭代
                            for(var j = 0; j < data.length; j++){
                                
                                //创建option
                                options = $('<option value="'+ data[j]['id'] +'">'+ data[j]['name'] +'</option>');

                                //添加
                                selects.append(options);
                            }
                        }
                    }
        });
    }

});

//商品名称丢失焦点事件
$('#name').on('blur',function(){

    //获取val
    var name = $(this).val();

    //判断是否输入内容
    if(!name){

        //修改样式
        $('#spanone').css('display','block').html('商品名称不能为空');
    }else{

        //状态值改为true
        namespan = true;

        //改变样式
        $('#spanone').css('display','none').html('');
    }   
});

//原价失去焦点事件
$('#oldpage').on('blur',function(){

    //获取输入的值
    var oldpage = $(this).val();

    //判断是否输入内容
    if(!oldpage){
        //修改样式
        $('#spantwo').css('display','block').html('请输入原价，不能为空');

    }else{

        //清空内容样式恢复
        $('#spantwo').css('display','none').html('');
         //声明正则
        var reg = /[0-9]/;
        //验证正则
        var res = reg.test(oldpage);

        //判断内容是否合法
        if(!res){
            $('#spantwo').css('display','block').html('请输入数字格式');
        }else{
            //修改状态值
            olds = true;
            $('#spantwo').css('display','none').html('');
        }
    }

});

//现价失去焦点事件
$('#newpage').on('blur',function(){
    //获取输入的值
    var newpage = $(this).val();

    //判断是否输入内容
    if(!newpage){

        //修改样式
        $('#spanthree').css('display','block').html('请输入现价，不能为空');

    }else{

        //清空内容样式恢复
        $('#spanthree').css('display','none').html('');
         //声明正则
        var reg = /[0-9]/;
        //验证正则
        var res = reg.test(newpage);

        //判断内容是否合法
        if(!res){
            $('#spanthree').css('display','block').html('请输入数字格式');
        }else{
            //修改状态值
            news = true;
            $('#spanthree').css('display','none').html('');
        }
    }
});

$('#fabu-form-submit').on('click',function(){

    if(namespan && olds && news && typespan){
        return true;
    }else{
        return false;
    }
    
});

</script>
@endsection