<!doctype html>
<html lang="en">
<head>
    <meta charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>FuckBAT</title>
    <link rel="stylesheet" href="{{ \Clockos\Test::cdn((elixir('css/all.css'))) }}">
    <link rel="stylesheet" href="{{ \Clockos\Test::cdn('/css/home.css') }}">
    <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <link rel="icon" href="{{ \Clockos\Test::cdn('/img/favicon.png')}}" type="image/gif" sizes="16x16">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('stylesheet')
</head>
<body>
@include('partials.nav')

<div class="jumbotron first-jumb">
    <div class="container">
        <h1 class="animated infinite shake">Fuck <span id="fucked">BAT</span><span id="dick"></span>  </h1>
        <h2>艹翻BAT</h2>
        <br/>
        <p>FuckBAT是一款主要面向程序猿的网络游戏<br/>
            写代码来打怪升级，干掉“BAT”这三个BOSS</p>
        <br/>
        <p><a class="btn btn-lg white-btn-lg" href="{{ url('/auth/login') }}" role="button">&nbsp;Start&nbsp;</a></p>
    </div>
</div>
<div class="jumbotron second-jumb">
    <div class="container">
        <h1>召集<span id="myTargetElement">1'000'000</span>名BAT Fuckers</h1>
        <h2>💩上最大的群P狂欢</h2>
        <br/>
        <p>
            这三个BOSS略强大，需要1000000个人才能干的动<br/>
            虽然第一个BOSS "B"自己就要挂了<br/>
            没办法...名字都起了，最主要的是花钱买域名了！<br/>
            按照这个字母顺序逐一干掉。<br/>
            <br/>
        <p><a class="btn btn-lg animated pulse infinite" href="{{ url('/auth/register') }}" role="button">&nbsp;成为第{{$status->members+1}}名BAT Fucker&nbsp;</a></p>
    </div>
</div>
<div class="container">
    <div class="jumbotron left-jumb col-sm-6">
        <div class="container">
            <br/>
            <br/>
            <br/>
            <br/>
            <h3>成为 BAT Fucker 的唯一条件</h3>
            <h1>零欺骗</h1>
            <br/>
            <p>不要套路，不要谎言。<br/>
                是几厘米就是几厘米，可以长，可以短<br/>
                是老爷们就不是老娘们，可以快，可以慢<br/>
                任何信息绝不允许虚报<br/>
                拒绝洗脑，拒绝画饼。<br/>
                <br/>
                <br/>
                <br/>
                <br/>
        </div>
    </div>
    <div class="jumbotron right-jumb col-sm-6">

            <h1 class="animated infinite hinge">Deceiving</h1>

    </div>
</div>

<div class="jumbotron second-jumb">
    <div class="container">
       <div class="embed-responsive embed-responsive-16by9">

        <iframe src="https://www.youtube.com/embed/pL_1Hqnq4z8?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" class="embed-responsive-item"></iframe>

        </div>
    </div>

</div>
<div class="container">
    <div class="jumbotron last-jumb">
        <div class="jumbotron left-jumb col-sm-6">
            <div class="container">

                <h2>扫码加入群聊</h2>
                <br/>
                <p><span id="letschat"></span><span class="animated infinite flash">|</span></p>
            </div>
        </div>
        <div class="jumbotron right-jumb col-sm-6">
            <div class="container">
                <br/><br/><br/>
            <img width="200px" src="{{ \Clockos\Test::cdn('/img/slack.svg')}}">
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="text-muted">
            <a href="/about/index">{{trans('app.about')}}</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/contact">{{trans('app.contact')}}</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://wograss.com">卧草科技</a>
            <span style="font-size: 12px;float: right" class="visible-md visible-lg"><a href="http://www.miitbeian.gov.cn/" target="_blank">{{trans('app.beian')}}</a>  &nbsp;&nbsp;&nbsp;Copyright © {{date('Y')}} Wograss. All Rights Reserved.</span>
        </p>
    </div>
</footer>

<script src="https://cdn.bootcss.com/jquery/1.12.0/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/countup.js/1.7.1/countUp.min.js"></script>
<script src="https://cdn.bootcss.com/typed.js/1.1.4/typed.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126411224-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126411224-1');
</script>
<script>
    $(document).ready(function(){
        var options = {
            useEasing : true,
            useGrouping : true,
            separator : "'",
            decimal : '.',
            prefix : '',
            suffix : ''
        };

        var demo = new CountUp("myTargetElement", 0, 1000000, 0, 10, options);
        demo.start();

        var i = 0;


        setInterval(function () {
            $("#fucked").text('ATB')
        }, 500);

        $("#letschat").typed({
            strings: ['来一起聊聊天😏<br/> ^500 聊啥啊🤔<br/> ^500 聊啥都行😅','这是神马J8网站😒<br/> ^500 ...<br/> ^500 确实要用到J8😂','用屌来做什么？<br/> ^500 来FuckBAT😆<br/> ^500 8==✊==3······......'],
            loop: true,
            typeSpeed: 100,
            cursorChar: ""
        });


        while(i<1000){
            setInterval(function () {
                $("#dick").html('<span style="margin-left: -26px">－<span style="margin-left: -32px">8</span></span>')

            }, 900);

            setInterval(function () {
                $("#dick").html('<span style="margin-left: -48px">－<span style="margin-left: -33px">8&nbsp;</span>')
            }, 1000);

            i++;
        }

    });
</script>
</body>
</html>
