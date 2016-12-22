@extends('app')
@section('stylesheet')
    <link rel="stylesheet" href="{{ \Clockos\Test::cdn('/css/home.css') }}">
@endsection
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron first-jumb">
    <div class="container">
        <h1 id="main-title">Fuck <span id="fucked">BAT</span><span id="dick"></span>  </h1>
        <h2>艹翻BAT</h2>
        <br/>
        <p>FuckBAT 是一款主要面向程序猿的网络游戏<br/>
            写代码来打怪升级，干掉“BAT”这三个BOSS</p>
        <br/>
        <p><a class="btn btn-lg" href="{{ url('/auth/login') }}" role="button">&nbsp;Start&nbsp;</a></p>
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
        <p><a class="btn btn-lg" href="{{ url('/auth/register') }}" role="button">&nbsp;成为第{{$status->members+1}}名BAT Fucker&nbsp;</a></p>
    </div>
</div>
<div class="jumbotron third-jumb">
    <div class="container">
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
    </div>
</div>
<div class="container">
    <div class="jumbotron last-jumb left-jumb col-sm-6">
        <div class="container">
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
        </div>
    </div>
    <div class="jumbotron last-jumb right-jumb col-sm-6">
        <div class="container">
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
        </div>
    </div>
</div>
<div class="jumbotron last-jumb">
    <div class="container">
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
    </div>
</div>
@section('footer')
    <script src="{{ \Clockos\Test::cdn('/js/countUp.js')}}"></script>
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
@endsection