<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <meta name="csrf_token" content="{{csrf_token()}}"/>
    <link href="{{asset('resources/components/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('resources/components/bootstrap/css/bootstrap-social.css')}}" rel="stylesheet"/>
    <link href="{{asset('resources/components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('resources/components/material/css/roboto.min.css')}}" rel="stylesheet">
    <link href="{{asset('resources/components/material/css/material.min.css')}}" rel="stylesheet">
    <link href="{{asset('resources/components/material/css/ripples.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('resources/funny/base/css/style.css')}}" type="text/css"/>

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
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
                    data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars"></i>
            </button>
            <a href="/" class="navbar-brand">Funny</a>
        </div>
        <nav class="navbar-collapse bs-navbar-collapse collapse" aria-expanded="false" style="height:1px">
            <ul class="nav navbar-nav">
                <li class="{{Request::segment(1)==''?"active":""}}">
                    <a href="/">{{trans('funny/nav.text.home')}}</a>
                </li>
                <li class="dropdown {{Request::segment(1)=="category"?"active":""}}">
                    <a href="#" class="dropdown-toggle" id="dropdownCategory" data-toggle="dropdown"
                       aria-expanded="true">{{trans('funny/nav.text.categories')}}</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownCategory">
                        @foreach($categories as $category)
                            <li class="" role="presentation">
                                <a role="menuitem" tabindex="-1"
                                   href="/category/{{$category->slug}}">{{$category->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown {{Request::segment(1)=="contry"?"active":""}}">
                    <a href="#" class="dropdown-toggle" id="dropdownCountry" data-toggle="dropdown"
                       aria-expanded="true">{{trans('funny/nav.text.countries')}}</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownCountry">
                        @foreach($nations as $nation)
                            <li class="" role="presentation">
                                <a role="menuitem" tabindex="-1"
                                   href="/country/{{$nation->slug}}">{{$nation->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="{{Request::segment(1)=="movies"?"active":"   "}}"><a
                            href="/movies">{{trans('funny/nav.text.movies')}}</a></li>
                <li class="{{Request::segment(1)=="series"?"active":"   "}}"><a
                            href="/series">{{trans('funny/nav.text.series')}}</a></li>

            </ul>
            <div class="col-sm-3 col-md-3 pull-left">
                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">

                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
    </div>
</header>
<main id="content" role="main" tabindex="-1">
    <div class="container" id="main">
        @yield('content')
    </div>
</main>
<div id="wrap">

</div>
</body>
</html>