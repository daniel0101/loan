<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Loan Management System</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
     <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap core CSS     -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="/css/light-bootstrap-dashboard-pro.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>
    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container">    
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">Loan Management System</a>
            </div>
            <div class="collapse navbar-collapse">       
                
                <ul class="nav navbar-nav navbar-right">
                    <li>
                    <a href="{{url('/login')}}">
                            Login
                        </a>
                    </li>
                    <li>
                    <a href="{{url('/application')}}">
                            Apply
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer footer-transparent">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="{{url('/')}}">
                                Home
                            </a>
                        </li>
                       
                    </ul>
                </nav>
                 <p class="copyright pull-right text-info">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#"> Loan Management System, made with love for a better world </a>
                </p>
            </div>
        </footer>

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
