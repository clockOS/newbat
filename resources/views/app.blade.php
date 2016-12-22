<!doctype html>
<html lang="en">
<head>
    <meta charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>FuckBAT</title>
    <link rel="stylesheet" href="{{ \Clockos\Test::cdn((elixir('css/all.css'))) }}">
    <link rel="icon" href="{{ \Clockos\Test::cdn('/img/favicon.png')}}" type="image/gif" sizes="16x16">
    <link href="https://cdn.bootcss.com/select2/4.0.1/css/select2.min.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('stylesheet')
</head>
<body>
    @include('partials.nav')


    <div class="container">
        @if (Session::has('flash_notification.message'))
            <div class="alert alert-{{ Session::get('flash_notification.level')}} @if(Session::get('flash_notification.important')) alert-important @endif">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {{ Session::get('flash_notification.message') }}
            </div>
        @endif
        @yield('content')
    </div>

    <footer class="footer">
        <div class="container">
            <p class="text-muted">
                <a href="/about/index">{{trans('app.about')}}</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/contact">{{trans('app.contact')}}</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://clockos.com">clockos.com</a>
                <span style="font-size: 12px;float: right" class="visible-md visible-lg"><a href="http://www.miitbeian.gov.cn/" target="_blank">{{trans('app.beian')}}</a>  &nbsp;&nbsp;&nbsp;Copyright © {{date('Y')}} clockOS. All Rights Reserved.</span>
            </p>
        </div>
    </footer>

    <script src="https://cdn.bootcss.com/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('div.alert').not('.alert-important').delay(3000).slideUp(300);
            $('#flash-overlay-modal').modal();
        });
    </script>
    <script src="https://cdn.bootcss.com/select2/4.0.1/js/select2.min.js"></script>
    @yield('footer')
</body>
</html>