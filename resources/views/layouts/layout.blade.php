<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>後台管理系統</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('/public/admin/css/jquery-ui-1.11.2/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/admin/css/jquery-ui-timepicker-addon.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('/public/admin/css/extends.css')}}">
    <link rel="stylesheet" href="{{asset('/public/admin/css/style-gray.css')}}">
    <link rel="stylesheet" href="{{asset('/public/admin/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/public/admin/css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('/public/admin/css/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!-- JS -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    <script src="{{asset('public/admin/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/js/jquery-ui-sliderAccess.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/js/jquery-ui-timepicker-addon.js')}}"></script>
{{--    <script type="text/javascript" src="{{asset('public/admin/js/is.min.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('public/admin/js/datepicker-zh-TW.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/layer/layer.js')}}"></script>
</head>
<body>
<div id="main">
    <!-- header -->
    <div id="head" class="head_gradient">
        <!-- logo -->
        <span id="logo">
        <span class="white18">{{Config::get('web.web_title')}}</span>
        <span class="dark_white18">網站管理台</span>
      </span>
        <span id="language" class="hide">
        <span class="white12">[目前語系]</span><span class="white12">繁體中文</span>｜
        <!-- <span class="dark_white12"><a href="'en/e06370d1/main'">ENGLISH</a></span>｜ -->
        <!-- <span class="dark_white12"><a href="'ch/e06370d1/main'">简体中文</a></span> -->
      </span>
        @if(session('user'))<div class="logout"><a href="{{url('admin/logout')}}" class="parent logout"><span>登出</span></a></div>@endif
    </div>
    <div id="head_line" class="head_line_gradient"></div>
    <!-- header end -->

    @if(session('user'))
    <div id="menu">
        <ul class="menu">
            <li><a href="#" class="parent"><span>連結區</span></a>
                <div>
                    <ul>
                        <li><a href="{{url('admin/index')}}" class="parent"><span>管理台首頁</span></a></li>
                        <li><a href="{{url('/')}}" class="parent" target="_blank"><span>網站首頁</span></a></li>
                    </ul>
                </div>
            </li>
            @if(count(Config::get('menu.header')) > 0)
                @foreach(Config::get('menu.header') as $k => $v)
                    <li><a href="#" class="parent"><span><?=$v;?></span></a>
                    @if(count(Config::get('menu.'.$k)) > 0 )
                        <div>
                            @foreach(Config::get('menu.'.$k) as $_k => $_v)
                                <ul>
                                    <li><a href="{{url($_v)}}" class="parent"><span><?=$_k?></span></a></li>
                                </ul>
                            @endforeach
                        </div>
                    @endif
                    </li>
                @endforeach
            @endif
            {{--<li><a href="{{url('admin/logout')}}" class="parent logout"><span>登出</span></a></li>--}}
            {{--<li><span>　系統時間：{{date('Y年m月d日 H時i分')}}</span></li>--}}
        </ul>
    </div>
    @endif
    <div class="alert alert-success text-center" id="alertBox" @if(session('msg'))  @else style="display:none" @endif>
            {{session('msg')}}
    </div>
    @if(count($errors)>0)
            @if(is_object($errors))
            <div class="alert alert-success text-center" id="alertBox1">
            @foreach($errors->all() as $e => $error)
                    @if($e == 0)
                        {{$error}}
                    @else
                       <br/>{{$error}}
                    @endif
                @endforeach
            @else
                {{$errors}}
            @endif
        </div>
    @endif

    <div id="bdbox">
       @yield('content')
    </div>

    <div id="foot">
        <span>程式維護：Chrisin</span>
    </div>
</div>

<script>
    $(function() {
        $('.alert').click(function() {
            $(this).slideUp(500);
        });

    });
</script>
</body>
</html>