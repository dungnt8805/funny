<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge"/>
    <title>@yield('title')</title>

    <meta name="csrf_token" content="{{csrf_token()}}"/>
    <link href="{{asset('resources/components/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('resources/components/bootstrap/css/bootstrap-theme.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('resources/components/bootstrap/css/bootstrap-social.css')}}" rel="stylesheet"/>
    <link href="{{asset('resources/components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('resources/components/material/css/roboto.min.css')}}" rel="stylesheet">
    <link href="{{asset('resources/components/material/css/material.min.css')}}" rel="stylesheet">
    <link href="{{asset('resources/components/material/css/ripples.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('resources/funny/base/css/style.css')}}" type="text/css" />

    <script src="{{asset('resources/components/jquery-2.1.0.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('resources/components/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('resources/components/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('resources/components/material/js/ripples.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('resources/components/bootstrap/js/material.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('resources/components/tag-it/js/tag-it.min.js')}}"></script>
</head>
<body>
<div id="wrap">
    @yield('content')
</div>
</body>
</html>