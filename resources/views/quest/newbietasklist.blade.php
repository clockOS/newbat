<style type="text/css">
.quest-type{
    position: absolute;
    right:18px;
    bottom: 0;
    text-align: right;
    color: white;
    text-shadow: rgba(0,0,09, 0.5) 1px 1px 6px;
    font-size: 18px;
}
.quest-level{
    position: absolute;
    left: 2px;
    color: #FFF;
    top: 18px;
    text-align: center;
    width: 50px;
}
.quest-title{
    word-wrap: break-word;
}
.btn-group-justified{
    margin-bottom: 20px;
}
</style>
@extends('app')
@section('content')
    <h1>{{trans('app.newbietask')}}</h1>
    <hr/>

    <div id="quests-list">
    @foreach($quests->all() as $quest)

        <a href="{{url("/newbie")}}/{{$quest->newbietasks.id}}" class="col-md-6 col-lg-4" id="{{$quest->newbietasks.id}}">
            <div class="panel panel-default">
                <img src="{{\Clockos\Test::cdn('/img/types/'.$quest->type.'.png')}}">
                <div class="panel-body">
                    <div class="list-first-row">
                        <div class="quests-list-title">{{$quest->title}}</div>
                    </div>
                    <div class="quests-list-status">
                        @include('partials.newbiestate',['state'=>$quest->state])
                            <br/><span class="glyphicon glyphicon-usd" aria-hidden="true"></span>&nbsp;{{trans_choice('app.stock',$quest->stock)}}:{{$quest->stock}}
                    </div>
                    <div class="quests-list-bottom">
                        <img src="{{\Clockos\Test::cdn('/img/level.png!35')}}" class="quests-logo" alt="Lv" align="right">
                        <img src="{{\Clockos\Test::cdn('/img/'.$quest->difficulty.'.png!35')}}" class="quests-logo" align="right">

                            <span class="quests-level">Lv.{{$quest->min_level}}</span>
                    </div>
                </div>
            </div>
        </a>

    @endforeach
    </div>

@stop

@section('footer')
    <script>
    </script>
@endsection
