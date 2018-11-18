<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{trans('app.brand')}} account confirmation</title>
</head>
<body>
    <h1>Welcome to {{trans('app.brand')}}</h1>
    <p><a href="{{ url("register/confirm/{$token}") }}">CONFIRM YOUR ACCOUNT NOW</a></p>
    <br/>If you can’t use the button, just try this link:
    <br/>{{ url('register/confirm/'.$token) }}
</body>
</html>
