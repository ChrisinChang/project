<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
        <link media="screen and (max-device-width: 480px)" href="{{asset('/resources/views/front/Style.css')}}" />
        <link media="screen and (min-width: 480px) and (max-device-width: 768px)" href="{{asset('/resources/views/front/Style-768px.css')}}" />
        <title>chrisin's introduction</title>
        <link rel="stylesheet" type="text/css" href="{{asset('/resources/views/front/style.css')}}" media="screen" />
        <link href="{{asset('/resources/views/front/css/jquery-ui-1.8.12.custom.css')}}" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="{{asset('/resources/views/front/js/jquery-1.7.1.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/resources/views/front/js/jquery-ui-1.8.12.custom.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/resources/views/front/js/jquery.ui.slider.js')}}"></script>
        <script type="text/javascript" src="{{asset('/resources/views/front/js/player.js')}}"></script>
        <script src="{{asset('/resources/views/front/js/time.js')}}" language="javascript" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $("#menuIcon,#header > ul > li").click(function () {
                    if ($("#menuIcon").is(":visible")) {
                        $("#header > ul").toggle(200);
                    };
                });
            });

            $(window).resize(function () {
                if (!$("#header > ul").is(":visible")) {
                    $('#navbar > ul').attr('style', function (i, style) {
                        return style.replace(/display[^;]+;?/g, '');
                    });
                }

            });
        </script>
    </head>

     <div id="container">
            
            <div id="header">
                <div id="menuIcon"><img src="/resources/views/front/images/menuIcon.png"></div>
                <ul>
                    <li><a target="_blank" href="https://www.facebook.com/saxonvic"><img src="/resources/views/front/images/icon_f.png"></a></li>
                    <li><a href="#"><img src="/resources/views/front/images/icon_l.png"></a>
                        <ul class="nav-sub-item">
                            <li>
                                <img src="/resources/views/front/images/line.jpg">
                                <span class="Lmessage"> 刷條碼可以加Line好友</span> 
                            </li>
                        </ul>
                    </li>
                    <li><a target="_blank" href="https://twitter.com/crystalrainy3"><img src="/resources/views/front/images/icon_t.png"></a></li>
                    <li><a target="_blank" href="https://youtu.be/myqJZDHrkE4"><img src="/resources/views/front/images/icon_y.png"></a></li>
                </ul>
            </div>
            <div id="nav"></div>
           <div class="cle"></div>
            <div id="content">
                <div id="left">
                    <div class="box">
                        <ul>
                            <li><span id="hour"></span><span>Hours</span></li>
                            <li><span id="minute"></span><span>Minutes</span></li>
                            <li><span id="second"></span><span>Seconds</span></li>
                        </ul>
                    </div>
                    <div class="musicPlayer">
            	    <!--歌手圖片-->
       			    <img class="cover" src="/resources/views/front/images/wheein.jpg" alt="cover">
        		    <div class="song"><!--播放器內容-->
            		<div class="songsInfo"><!--歌曲資訊-->
                		<h3 class="song-name">햇살이 아파 </h3>
                		<p class="singer">휘인</p>
            		</div>
            		<div class="btnMenu"><!--控制面板-->
            			<span class="pre"></span><!--前一首歌-->
                		<span class="play" id="playBtn"></span><!--播放按鈕-->
                		<span class="next"></span><!--下一首歌-->
              			<div id="progress"></div><!--進度條-->
            			<span id="volumeIco" class="volumeUp"></span><!--音量圖示-->
                		<div class="volumeBar"><!--音量控制面板-->
                		    <div id="volume"></div><!--音量大小-->
                		</div>
             		</div>            
          		</div>
   			 </div>
                </div>
                <div id="right">
                    <ul class="tabs">
                        <li>
                            <input type="radio" name="tabs" id="tab1" checked/>
                            <label for="tab1" class="label1">簡介</label>
                            <div id="tab-content1" class="tab-content">
                                <div id="tab-in1">
                                    <img class="me" src="/resources/views/front/images/me.png" alt="me">
                                    <div class="info_m">
                                        <ul>
                                            <li>姓名：張心桐　chrisin</li>
                                            <li>學歷：虎尾科技大學</li>
                                            <li>科系：資訊管理系</li>
                                            <li>身分：待業中</li>
                                            <li>工作資歷：PHP程式助理設計師</li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="tabs" id="tab2" />
                            <label for="tab2" class="label2">技能</label> 
                            <div id="tab-content2" class="tab-content">
                                <div id="tab-in2">
                                    <div class="info_m">
                                        <ul class="group">
                                            <li class="title">證照</li>
                                            <li>EPCglobal→　About RFID</li>
                                            <li>ERPS→　About ERP</li>
                                            <li>電腦硬體裝修：乙級、丙級</li>
                                            <li>網頁設計丙級</li>
                                            <li class="sor">參賽→全國大專電腦軟體設計競賽：應用軟體設計組佳作</li>
                                        </ul>
                                        <ul class="group">
                                            <li class="title">擅長語言</li>
                                            <li>php</li>
                                            <li>html</li>
                                            <li>css</li>
                                            <li>mysql</li>
                                        </ul>
                                        <ul class="group">
                                            <li class="title">工具</li>
                                            <li>Microsoft　WebMatrix</li>
                                            <li>Adobe　Photoshop</li>
                                            <li>Dreamweaver</li>
                                            <li>Illustrator</li>
                                            <li>Premiere</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="tabs" id="tab3" />
                            <label for="tab3" class="label3">圖片</label>
                            <div id="tab-content3" class="tab-content">
                                <div id="tab-in3">
                                    <div class="info_m">
                                        <ul class="link-img">
                                            <li><a href="#pic1"><img src="/resources/views/front/images/EPCglobal.jpg"></a></li>
                                            <li><a href="#pic2"><img src="/resources/views/front/images/ERPS.jpg"></a></li>
                                            <li><a href="#pic3"><img src="/resources/views/front/images/eg.jpg"></a></li>
                                            <li><a href="#pic4"><img src="/resources/views/front/images/ei.jpg"></a></li>
                                            <li><a href="#pic5"><img src="/resources/views/front/images/eb.jpg"></a></li>
                                            <li><a href="#pic6"><img src="/resources/views/front/images/w.jpg"></a></li>
                                        </ul>
                                        <ul class="full-img">
                                            <li id="pic1"><a href="#"><img src="/resources/views/front/images/EPCglobal.jpg"></a></li>
                                            <li id="pic2"><a href="#"><img src="/resources/views/front/images/ERPS.jpg"></a></li>
                                            <li id="pic3"><a href="#"><img src="/resources/views/front/images/eg.jpg"></a></li>
                                            <li id="pic4"><a href="#"><img src="/resources/views/front/images/ei.jpg"></a></li>
                                            <li id="pic5"><a href="#"><img src="/resources/views/front/images/eb.jpg"></a></li>
                                            <li id="pic6"><a href="#"><img src="/resources/views/front/images/w.jpg"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="tabs" id="tab4" />
                            <label for="tab4" class="label4">留言板</label>
                            <div id="tab-content4" class="tab-content">
                                <div id="tab-in4">
                                    <div class="info_m">
                                       <form method="post" action="" data-ajax="false">
                                            <label for="nickname">請輸入您的暱稱： </label>
                                                <input type="text" name="nickname" id="nickname" required />
                                            <label for="msg">請輸入您的留言:</label>
                                                <input type="text" name="msg" id="msg"/>
                                            <input type="submit" name="send" id="send" value="送出"/>
                                        </form>
                                            <div id="a">
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="cle"></div>
            </div>


            <div id="bd">
                <input checked type="radio" name="slider" id="slider1">
                <input type="radio" name="slider" id="slider2">
                <input type="radio" name="slider" id="slider3">
                <input type="radio" name="slider" id="slider4">
                <input type="radio" name="slider" id="slider5">
                <div id="sliders">
                    <div id="overflow">
                        <div class="inner">
                            <article>
                                <div class="info">
                                    <h1>My Love Photos01</h1>
                                </div>
                                <img src="/resources/views/front/images/photo01a.png" />
                            </article>
                            <article>
                                <div class="info">
                                    <h1>My Love Photos02</h1>
                                </div>
                                <img src="/resources/views/front/images/photo02.png" />
                            </article>
                            <article>
                                <div class="info">
                                    <h1>My Love Photos03</h1>
                                </div>
                                <img src="/resources/views/front/images/photo03.png" />
                            </article>
                            <article>
                                <div class="info">
                                    <h1>My Love Photos04</h1>
                                </div>
                                <img src="/resources/views/front/images/photo04.png" />
                            </article>
                            <article>
                                <div class="info">
                                    <h1>My Love Photos05</h1>
                                </div>
                                <img src="/resources/views/front/images/photo05.png" />
                            </article>                        
                        </div>
                    </div>
                </div>
                <div id="controls">
                    <label for="slider1"></label>
                    <label for="slider2"></label>
                    <label for="slider3"></label>
                    <label for="slider4"></label>
                    <label for="slider5"></label>
                </div>
            </div>
            
            <div class="cle"></div>
            <div id="footer">
                COPYRIGHT&copy|　<span>chrisin's house</span>
            </div>
        </div>
        <script src="/resources/views/front/js/time.js" language="javascript" type="text/javascript"></script>
    </body>
</html>
