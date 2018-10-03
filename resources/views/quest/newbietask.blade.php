@extends('app')
@section('stylesheet')
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
.quests-prerequisite td{
    border-top: none!important;
}
.btn-group-justified{
    margin-bottom: 20px;
}
.quest-skill{
    height:50px!important;
    width:50px!important;
}
</style>
<link href="https://lib.baomitu.com/highlight.js/9.1.0/styles/tomorrow-night.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
        <div class="col-md-8">
            <h3 class="quest-title">{{$quest->title}}</h3><br/>
            @include('partials.state',['state' => $quest->state])
            <br/>

            <br/>
            <a style="vertical-align: middle;display: inline-block" href="#" data-toggle="tooltip" data-placement="bottom" title="{{trans('app.level')}}:{{$quest->min_level}}">
                <div style="position: relative"><img src="{{\Clockos\Test::cdn('/img/level.png!75')}}" alt="Level" class="quest-skill">
                    <span class="quest-level">Lv.{{$quest->min_level}}</span>
                </div>
            </a>
            <a style="vertical-align: middle;display: inline-block" href="#" data-toggle="tooltip" data-placement="bottom" title="{{trans('show.difficulty')}}:{{trans('show.'.$quest->difficulty)}}">
                <div><img src="{{\Clockos\Test::cdn('/img/'.$quest->difficulty.'.png!75')}}" alt="Level" class="quest-skill"></div>
            </a>
            @foreach($quest->departments as $skill)
                <a style="vertical-align: middle;display: inline-block" href="#" data-toggle="tooltip" data-placement="bottom" title="{{$skill->fullname}}">
                    <div><img src="{{\Clockos\Test::cdn($skill->logo.'!75')}}" alt="{{$skill->name}}" class="quest-skill"></div>
                </a>
            @endforeach
            @foreach($quest->skills as $skill)
                <a style="vertical-align: middle;display: inline-block" href="#" data-toggle="tooltip" data-placement="bottom" title="{{$skill->fullname}}">
                    <div><img src="{{\Clockos\Test::cdn($skill->logo.'!75')}}" alt="{{$skill->name}}" class="quest-skill"></div>
                </a>
            @endforeach
        </div>
        <div class="col-md-4">
            <img src="{{\Clockos\Test::cdn('/img/types/'.$quest->type.'.png')}}">
            <span class="quest-type" style="">{{trans('form.'.$quest->type)}}</span>
        </div>
        </div>
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
