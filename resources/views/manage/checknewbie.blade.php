@extends('app')
@section('content')
<h1>检查新手任务</h1><hr/>
<table class="table table-hover">
    <tr>
        <th>id</th>
        <th>{{trans('form.title')}}</th>
        <th>{{trans('app.user')}}</th>
        <th>{{trans('show.completed')}}</th>
    </tr>
    @foreach($quests as $item)
        <tr>
            <td>#{{$item->cid}}</td>
            <td><a href="/newbie/{{$item->task_id}}">查看任务</a></td>
            <td><a href="{{action('ProfilesController@show',[$item->user_id])}}">执行者</a></td>
            <td>{{$item->updated_at}}</td>
        </tr>
    @endforeach
</table>
<div class="col-md-12" style="text-align: center">{!! $quests->appends(Request::except('page'))->render()!!}</div>
@endsection
@section('footer')
@endsection
