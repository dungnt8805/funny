<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge"/>
    <title>@yield('title')</title>

    <meta name="csrf_token" content="{{csrf_token()}}"/>
    <link href="{{asset('resources/components/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>
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
    <script src="{{asset('resources/components/material/js/material.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('resources/funny/base/js/script.js')}}"></script>
</head>
<body>
    <header id="header-hav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand">Funny</a>
            </div>
            <nav class="navbar-collapse bs-navbar-collapse collapse" aria-expanded="false" style="height:1px">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/admin/categories">Categories</a>
                    </li>
                    <li><a href="/admin/nations">Nations</a></li>
                    <li><a href="/admin/films">Films</a></li>
                    <li><a href="/admin/users">Users</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main id="content" role="main" tabindex="-1">
        <div class="container">
            @yield('content')
        </div>
    </main>
    <div id="wrap">
        
    </div>
</body>
</html>