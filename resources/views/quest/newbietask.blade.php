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
test
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
