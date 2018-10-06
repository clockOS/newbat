@extends('app')
@section('stylesheet')
    <link rel="stylesheet" href="{{ \Clockos\Test::cdn('/css/login.css') }}">
@endsection
@section('content')
    <h2>什么是{{trans('app.brand')}}?</h2>
    <br>
    <p>{{trans('app.brand')}} 是一个网络游戏，玩家们通过做各种任务共同击败BAT这三个BOSS</p>
    <br>
    
    <h2>玩家能获得什么?</h2>
    <br>
    <p>获得金钱：就像大多数网络游戏，很多人可以通过它来赚钱一样。完成任务获得的金币可以用来交换现实里的钱，并且平台会根据玩家所持金币的数量定期发放分红与工资。</p>
    <br>
    <p>获得技能：任务涵盖了开发推广创作等一家科技公司里可能用到的所有技能，难度有高有低。</p>
    <br>
    <p>获得认可：等级越高越能证明玩家在某个领域的专业程度</p>
    <br>
    <p>获得快乐：一款游戏的本质</p>
    <br>
    
    <h2>主要任务是什么?</h2>
    <br>
    <p>创造一个搜索电商社交一体的产品取代BAT</p>
    <p><a href="https://fuckb.at/docs/workflow">产品大致的模样</a>
    <br>

@stop
