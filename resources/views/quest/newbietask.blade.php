@extends('app')
@section('stylesheet')
<style type="text/css">
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
.quest-skill{
    height:50px!important;
    width:50px!important;
}
.quests-prerequisite td{
    border-top: none!important;
}
</style>
<link href="https://lib.baomitu.com/highlight.js/9.1.0/styles/tomorrow-night.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
        <div class="col-md-8">
            <h3 class="quest-title">{{$title}}</h3><br/>
            <br/>
            <br/>
            <a style="vertical-align: middle;display: inline-block" href="#" data-toggle="tooltip" data-placement="bottom" title="{{trans('app.level')}}:{{$min_level}}">
                <div style="position: relative"><img src="{{\Clockos\Test::cdn('/img/level.png!75')}}" alt="Level" class="quest-skill">
                    <span class="quest-level">Lv.{{$min_level}}</span>
                </div>
            </a>
            <a style="vertical-align: middle;display: inline-block" href="#" data-toggle="tooltip" data-placement="bottom" title="{{trans('show.difficulty')}}:{{trans('show.'.$difficulty)}}">
                <div><img src="{{\Clockos\Test::cdn('/img/'.$difficulty.'.png!75')}}" alt="Level" class="quest-skill"></div>
            </a>
        </div>
        <div class="col-md-4">
            <img src="{{\Clockos\Test::cdn('/img/types/'.$type.'.png')}}">
        </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{trans('show.basic')}}</h3>
        </div>
        <div class="panel-body">
            <table class="table quests-prerequisite">
                <tr>
                    <td>{{trans('app.level')}}</td>
                    <td>{{$min_level}}</td>
                </tr>
                <tr>
                    <td>{{trans('show.difficulty')}}</td>
                    <td>{{trans('show.'.$difficulty)}}</td>
                </tr>
                <tr>
                    <td>{{trans_choice('app.stock',$stock)}}</td>
                    <td>{{$stock}}</td>
                </tr> 
                <tr>
                    <td>{{trans('app.exp')}}</td>
                    <td>{{$experience}}</td>
                </tr> 
                <tr>
                    <td>{{trans('app.vote')}}</td>
                    <td>{{$vote}}</td>
                </tr> 
            </table>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{trans('form.details')}}</h3>
        </div>
        <div class="panel-body">

            @if((\Auth::user()->level>=$min_level))
            <div class="quests-markdown">{!! $body !!}</div>
            @endif
            @if((@$user_id==\Auth::id())AND($state!="9"))
            <span class="bg-warning text-warning">{{trans('show.min_level',['level' =>$min_level])}}</span>
            @endif
        </div>
    </div>

    
    <div class="btn-group btn-group-justified col-lg-6" role="group" aria-label="...">

    @if((\Auth::user()->level>=$min_level)AND(@$user_id!=\Auth::id()))

        <a class="btn btn-primary" href="/newbietask/start/{{$id}}">开始任务</a>

    @endif
    @if((@$user_id==\Auth::id())AND($state!="9"))

        <a class="btn btn-primary" href="/newbietask/done/{{$id}}" data-token="{{csrf_token()}}" data-method="get" data-confirm="{{trans('show.sure')}}">我已经完成了任务</a>

    @endif
    </div>
@stop

@section('footer')
    <script src="https://lib.baomitu.com/highlight.js/9.1.0/highlight.min.js"></script>
    <script src="https://lib.baomitu.com/mathjax/2.6.1/MathJax.js?config=TeX-AMS_HTML"></script>
    <script>
        hljs.initHighlightingOnLoad();
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
            $('.quests-markdown table').addClass('table')
        })


        $(function() {

            var laravel = {
                initialize: function() {
                    this.methodLinks = $('a[data-method]');
                    this.token = $('a[data-token]');
                    this.registerEvents();
                },

                registerEvents: function() {
                    this.methodLinks.on('click', this.handleMethod);
                },

                handleMethod: function(e) {
                    var link = $(this);
                    var httpMethod = link.data('method').toUpperCase();
                    var form;

                    // If the data-method attribute is not PUT or DELETE,
                    // then we don't know what to do. Just ignore.
                    if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
                        return;
                    }

                    // Allow user to optionally provide data-confirm="Are you sure?"
                    if ( link.data('confirm') ) {
                        if ( ! laravel.verifyConfirm(link) ) {
                            return false;
                        }
                    }

                    form = laravel.createForm(link);
                    form.submit();

                    e.preventDefault();
                },

                verifyConfirm: function(link) {
                    return confirm(link.data('confirm'));
                },

                createForm: function(link) {
                    var form =
                            $('<form>', {
                                'method': 'POST',
                                'action': link.attr('href')
                            });

                    var token =
                            $('<input>', {
                                'type': 'hidden',
                                'name': '_token',
                                'value': link.data('token')
                            });

                    var hiddenInput =
                            $('<input>', {
                                'name': '_method',
                                'type': 'hidden',
                                'value': link.data('method')
                            });

                    return form.append(token, hiddenInput)
                            .appendTo('body');
                }
            };

            laravel.initialize();
        });
    </script>
@endsection
