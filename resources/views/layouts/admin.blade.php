<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Loan Management System</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="/img/sidebar-5.jpg">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="/" class="simple-text">
                    Loan Management System
                </a>
            </div>

            <ul class="nav">
                @if(Auth::user()->email == 'admin@lms.com')
                <li class="active">
                    <a href="{{ url('/dashboard') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('/loan') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Manage Loans</p>
                    </a>
                </li>
                {{--  <li class="">
                    <a href="{{ url('/users') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Manage Users</p>
                    </a>
                </li>  --}}
                <li class="">
                    <a href="{{ url('/paybacks') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Manage Paybacks</p>
                    </a>
                </li>
                 <li class="">
                    <a href="{{ url('/monitors') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Loan Monitoring</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('/applications') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Manage Applications</p>
                    </a>
                </li>
                @else
                <li class="">
                    <a href="{{ url('/userloans') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Manage Loans</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('/payments') }}">
                        <i class="pe-7s-graph"></i>
                        <p>My Payments</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('/myapplications') }}">
                        <i class="pe-7s-graph"></i>
                        <p>My Applications</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('/application') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Apply now</p>
                    </a>
                </li>                
                
                @endif
                <li class="">
                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="pe-7s-close-circle"></i>
                        <p>logout</p>
                    </a>
                </li>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               {{Auth::user()->name}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    @include('layout.flash_message')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    
                    @yield('content')
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Loan Management System</a>, made with love for a better world
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="/js/demo.js"></script>


</html>
