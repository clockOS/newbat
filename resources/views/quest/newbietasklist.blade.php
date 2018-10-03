@extends('app')
@section('content')
    <h1>{{trans('app.newbietask')}}</h1>
    <hr/>

    <div id="quests-list">
    @foreach($quests->all() as $quest)

        <a href="{{action('QuestsController@show',[$quest->id])}}" class="col-md-6 col-lg-4" id="{{$quest->id}}">
            <div class="panel panel-default">
                <img src="{{\Clockos\Test::cdn('/img/types/'.$quest->type.'.png')}}">
                <div class="panel-body">
                    <div class="list-first-row">
                        <div class="quests-list-title">{{$quest->title}}</div>
                    </div>
                    <div class="quests-list-status">
                        @include('partials.state',['state'=>$quest->state])
                            <br/><span class="glyphicon glyphicon-usd" aria-hidden="true"></span>&nbsp;{{trans_choice('app.stock',$quest->stock)}}:{{$quest->stock}}
                    </div>
                    <div class="quests-list-bottom">
                        <img src="{{\Clockos\Test::cdn('/img/level.png!35')}}" class="quests-logo" alt="Lv" align="right">
                        <img src="{{\Clockos\Test::cdn('/img/'.$quest->difficulty.'.png!35')}}" class="quests-logo" align="right">
                        @foreach($quest->departments as $item)
                            <img src="{{\Clockos\Test::cdn($item->logo.'!35')}}" class="quests-logo" alt="{{$item->name}}" align="right">
                        @endforeach
                        @foreach($quest->skills as $item)
                            <img src="{{\Clockos\Test::cdn($item->logo.'!35')}}" class="quests-logo" alt="{{$item->name}}" align="right">
                        @endforeach

                            <span class="quests-level">Lv.{{$quest->min_level}}</span>
                    </div>
                </div>
            </div>
        </a>

    @endforeach
    </div>
    <div class="col-md-12" style="text-align: center">{!! $quests->appends(Request::except('page'))->render()!!}</div>

@stop

@section('footer')
    <script>
    </script>
@endsection
