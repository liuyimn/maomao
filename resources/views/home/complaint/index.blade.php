@extends('home.userlout')

@section('content')

<meta http-equiv="Cache-Control" content="no-transform " />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" href="/home/complaint/css/base.min.css" />
<link rel="stylesheet" type="text/css" href="/home/complaint/css/feedback.min.css" />
</head>
<body>
        <div class="row">
            <div class="span14">
                <form method="post" action="{{url('home/complaint/insert')}}">
                    <div class="feedback-main" style="height:513px">
                        <ul class="feedback-nav  clearfix J_tabSwitch">
                            <li>问题反馈</li>
                              @if(session('info'))
                              <div class="alert alert-danger">
                                  {{ session('info') }}
                              </div>
                              @endif

                        </ul>
                        <div class="tab-container">
                            <div class="tab-content clearfix">
                                <div class="form-box">
                                    <h2 class="title">对您给予的帮助和支持，深表感谢！</h2>
                                        {{ csrf_field() }}
                                    <div class="form-section">
                                        <label class="input-label" for="feedbackQuestion">在这里描述您遇到的问题</label>
                                        <textarea class="input-text input-textarea" style="resize:none;" id="feedbackQuestion" name="content" placeholder="问题描述须大于10小于200个字"></textarea>
                                    </div>
                                       @if (count($errors) > 0)
                                              <ul style="color:red;">
                                                  @foreach ($errors->all() as $error)
                                                      <li>{{ $error }}</li>
                                                  @endforeach
                                              </ul>
                                      @endif
                                    <button type="submit" class="btn btn-primary">提交问题</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>





<!-- .modal-globalSites END -->
<script src="/home/complaint/js/base.min.js"></script>
<script>
(function() {
    MI.namespace('GLOBAL_CONFIG');
    MI.GLOBAL_CONFIG = {
        damiaoGoodsId:["2160400006","2160400007","2162100004","2162800010","2155300001","2155300002","2163500025","2163500026","2163500027","2164200021","2142400036","2170800008","2171000055","2171500039","2171600005","1171800032","1171800031","1171800030","1171800035","1171800034","1171800033","1172000058","2171500038","2171800016","2171500037","2171900024"],
    };
   
})(); 
</script>
<script type="text/javascript" src="/home/complaint/js/feedback.min.js"></script>
<script src="/home/complaint/js/xmsg_ti.js"></script>
<!--mae_monitor--></body>
</html>
@endsection
