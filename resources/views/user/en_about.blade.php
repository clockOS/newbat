<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>{{trans('app.brand')}}</title>
    <link rel="stylesheet" href="{{ \Clockos\Test::cdn((elixir('css/all.css'))) }}">
    <link rel="stylesheet" href="{{ \Clockos\Test::cdn('/css/home.css') }}">
    <link href="https://lib.baomitu.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <link rel="icon" href="{{ \Clockos\Test::cdn('/img/favicon.png')}}" type="image/gif" sizes="16x16">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://lib.baomitu.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://lib.baomitu.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('stylesheet')
</head>
<body>
@include('partials.nav')

<div class="jumbotron first-jumb">
    <div class="container">
        <h1 class="animated shake">CoolDevelop</h1>
        <br/>
        <p>Make an App with thousands of developers</p>
        <br/>
        <p><a class="btn btn-lg white-btn-lg" href="{{ url('/auth/login') }}" role="button">&nbsp;Start&nbsp;</a></p>
    </div>
</div>
<div class="jumbotron second-jumb">
    <div class="container">
        <h1>Gathering<span id="myTargetElement">1'000'000</span>developers</h1>
        <br/>
        <p>
            One App, One Goal<br/>

            <br/>
        <p><a class="btn btn-lg animated pulse infinite" href="{{ url('/auth/register') }}" role="button">&nbsp;Become a member</a></p>
    </div>
</div>
<div class="container">
    <div class="jumbotron left-jumb col-sm-6">
        <div class="container">
            <br/>
            <br/>
            <br/>
            <br/>
            <h3>Why it is cool </h3>
            <br/>
            <p>Participate wherever you are<br/>
                Get the reward no matter how small it is<br/>
                A new way to make decision together<br/>
                You will always find a worktype you like<br/>
                Intuitive data helps you grow<br/>
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

<div class="jumbotron second-jumb" style="display:none">
    <div class="container">
       <div class="embed-responsive embed-responsive-16by9">

        <iframe id="youtubeFrame" src="https://www.youtube.com/embed/nLvsBkscbiI?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" class="embed-responsive-item"></iframe>

        </div>
    </div>

</div>
<div class="jumbotron second-jumb" id="alivid">
    <div class="container">
       <div class="embed-responsive embed-responsive-16by9">
       
        <video width="320" height="240" controls>
          <source src="https://video.fuckb.at/video/580d8d15-166328a22eb-0005-869e-c38-18e49.mp4" type="video/mp4">
        Your browser does not support the video tag.
        </video>
        
        </div>
    </div>

</div>
<div class="container">
    <div class="jumbotron last-jumb">
        <div class="jumbotron left-jumb col-sm-6">
            <div class="container">
                <p><span id="letschat" style="font-size:11"></span><span class="animated infinite flash">|</span></p>
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
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a>CoolDevelop</a>
            <span style="font-size: 12px;float: right" class="visible-md visible-lg"><a href="http://www.miitbeian.gov.cn/" target="_blank">{{trans('app.beian')}}</a>  &nbsp;&nbsp;&nbsp;Copyright © {{date('Y')}} Wograss. All Rights Reserved.</span>
        </p>
    </div>
</footer>

<script src="https://lib.baomitu.com/jquery/1.12.0/jquery.min.js"></script>
<script src="https://lib.baomitu.com/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://lib.baomitu.com/countup.js/1.9.3/countUp.min.js"></script>
<script src="https://lib.baomitu.com/typed.js/1.1.7/typed.min.js"></script>
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

        $('#youtubeFrame').load(function(){
            $(this).closest('.second-jumb').show();
            $("#alivid").hide();
        });
    
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

        $("#letschat").typed({
            strings: ['∎∎∎∎∎∎ "∎∎∎"<br/> ^500 ∎∎∎∎ ∎∎∎∎() {<br/> ^500<span style="color:#222">∎∎∎</span>     ∎∎∎.∎∎∎∎∎("∎∎∎, ∎∎")<br/> ^100 }','#∎∎∎∎∎∎∎ <∎∎∎∎∎.∎> <br/> ^500 ∎∎∎ ∎∎∎∎()<br/> ^500 { ^500 <span style="color:#222">∎∎</span> ∎∎∎∎∎∎("∎∎∎∎∎, ∎∎∎∎∎!"); <br/> ^500 <span style="color:#222">∎∎</span>∎∎∎∎∎∎ ∎;<br/> ^100 }','∎∎∎∎∎ ∎∎∎∎∎∎∎  {<br/> ^500 <span style="color:white">∎∎</span> ∎∎∎∎∎∎ ∎∎∎∎∎∎ ∎∎∎∎ ∎∎∎∎(∎∎∎∎∎∎[] ∎∎∎∎) {<br/> ^500 <span style="color:#222">∎∎∎∎</span> ∎∎∎∎∎∎.∎∎∎.∎∎∎∎∎∎∎("∎∎∎∎∎, ∎∎∎∎∎!");<br/>  ^100 <span style="color:#222">∎∎</span>}</br> ^100 } '],
            loop: true,
            typeSpeed: 100,
            cursorChar: ""
        });

    });
</script>
</body>
</html>
