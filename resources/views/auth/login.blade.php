@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('auth.login')}} {{trans('app.brand')}}</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong>{{trans('auth.input')}}<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{trans('auth.email')}}</label>
                            <div class="col-md-4">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{trans('auth.password')}}</label>
                            <div class="col-md-4">
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> {{trans('auth.remember')}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">{{trans('auth.login')}}</button>

                                <a class="btn btn-link" href="{{ url('/password/email') }}">{{trans('auth.forget')}}?</a>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <a class="btn btn-primary btn-block" href="{{ url('/auth/register') }}" style="margin: 10px 0">
                                {{trans('auth.signup')}}
                                </a>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
