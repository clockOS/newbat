@extends('app')
@section('content')
<h1>检查新手任务</h1><hr/>
<table class="table table-hover">
    <tr>
        <th>id</th>
        <th>{{trans('form.title')}}</th>
        <th>{{trans('app.user')}}</th>
    </tr>
    @foreach($results as $item)
        <tr>
            <td>#{{$item->cid}}</td>
            <td><a href="/newbie/{{$item->task_id}}">{{$item->title}}</a></td>
            <td><a href="{{action('ProfilesController@show',[$item->user_id])}}">{{$item->user->email}}</a></td>
        </tr>
    @endforeach
</table>
<div class="col-md-12" style="text-align: center">{!! //$results->appends(Request::except('page'))->render()!!}</div>
@endsection
@section('footer')
@endsection
