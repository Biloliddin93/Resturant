<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@section("title") Smart cafe @show</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ URL("") }}img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="{{ URL("") }}img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="{{ URL("") }}img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="{{ URL("") }}img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="{{ URL("") }}img/favicon.png" rel="icon" type="image/png">
    <link href="{{ URL("") }}img/favicon.ico" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="{{ URL("css/separate/vendor/select2.min.css") }}">
    <link rel="stylesheet" href="{{ URL("css/lib/font-awesome/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ URL("css/separate/vendor/bootstrap-touchspin.min.css") }}">
    <link rel="stylesheet" href="{{ URL("css/lib/font-awesome/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ URL("css/lib/bootstrap/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ URL("css/main.css") }}">
</head>
<body class="with-side-menu">

<header class="site-header">
    <div class="container-fluid">

        <a href="#" class="site-logo">
            <img class="hidden-md-down" src="img/logo-2.png" alt="">
            <img class="hidden-lg-up" src="img/logo-2-mob.png" alt="">
        </a>

        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
            <span>toggle menu</span>
        </button>

        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">





                    <button type="button" class="burger-right">
                        <i class="font-icon-menu-addl"></i>
                    </button>
                </div><!--.site-header-shown-->

                <div class="mobile-menu-right-overlay"></div>
                <div class="site-header-collapsed">
                    <div class="site-header-collapsed-in">
                        <a href="{{ URL("/myorder") }}" class="btn btn-rounded dropdown-toggle" >
                            Буюртмалар
                        </a>


                    </div><!--.site-header-collapsed-in-->
                </div><!--.site-header-collapsed-->
            </div><!--site-header-content-in-->
        </div><!--.site-header-content-->
    </div><!--.container-fluid-->
</header><!--.site-header-->

<div class="mobile-menu-left-overlay"></div>
<nav class="side-menu">

    @if(Session::isValidId(Session::getId()))
    <ul class="side-menu-list">
        @if(Session::get("status")==1)
        <li class="grey with-sub">
	            <span>
	                <i class="font-icon font-icon-dashboard"></i>
	                <span class="lbl">Администратор</span>
	            </span>
            <ul>
                <li><a href="{{ URL("/users") }}"><span class="lbl">Фойдаланувчилар</span></a></li>
                <li><a href="{{ URL("/taom") }}"><span class="lbl">Таомлар</span></a></li>
                <li><a href="{{ URL("/") }}"><span class="lbl">Статистика</span></a></li>

            </ul>
        </li>
        @endif
            @if(Session::get("status")==3)
        <li class="grey with-sub">
	            <span>
	                <i class="font-icon font-icon-dashboard"></i>
	                <span class="lbl">Буюртма</span>
	            </span>
            <ul>
                <li><a href="{{ URL("/zakaz") }}"><span class="lbl">Буюртмалар</span></a></li>


            </ul>
        </li>
            @endif

            @if(Session::get("status")==2)
        <li class="grey with-sub">
	            <span>
	                <i class="font-icon font-icon-dashboard"></i>
	                <span class="lbl">Повар</span>
	            </span>
            <ul>
                <li><a href="{{ URL("/povar") }}"><span class="lbl">Буюртмалар</span></a></li>


            </ul>
        </li>
            @endif

    </ul>
@endif

</nav><!--.side-menu-->

<div class="page-content">
    <div class="container-fluid">
        @section("content")
            @show
    </div><!--.container-fluid-->
</div><!--.page-content-->

<script src="{{ URL("js/lib/jquery/jquery.min.js") }}"></script>
<script src="{{ URL("js/lib/tether/tether.min.js") }}"></script>
<script src="{{ URL("js/lib/bootstrap/bootstrap.min.js") }}"></script>
<script src="{{ URL("js/plugins.js") }}"></script>

<script src="{{ URL("js/app.js") }}"></script>
<script src="{{ URL("js/vue.min.js") }}"></script>
<script src="{{ URL("js/lib/select2/select2.full.min.js") }}"></script>
<script src="{{ URL("js/lib/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js") }}"></script>

@section("js")
    @show
</body>
</html>