<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Loan Managers</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>
    <link href="/css/demo.css" rel="stylesheet" />

    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
    <script src="/js/popper.js" type="text/javascript"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/nucleo-icons.css" rel="stylesheet">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-fixed-top bg-danger" style="margin-bottom: 0px;">
		<div class="container">
			<div class="navbar-translate">
				<div class="navbar-header">
					<a class="navbar-brand" href="{{url('/')}}" style="padding: 31px 15px; font-size: 20px;">Loan Managers</a>
				</div>
				{{--  <button class="navbar-toggler navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
				</button>  --}}
			</div>
			<div class="collapse navbar-collapse pull-right">
				<ul class="navbar-nav ml-auto" style="list-style-type: none; margin-top: 2em;">
					
                    @if (Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                    @else
                        @if(Auth::user()->email == 'admin@lms.com')
                            <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ url('/userloans') }}">My Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/application') }}">Apply</a></li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
				</ul>
			</div>
		</div>
	</nav>
    @include('layout.flash_message')
    @yield('content')
    <footer class="footer section-dark">
		<div class="container">
			<div class="row">
				<nav class="footer-nav">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="{{ url('/application')}}">apply</a></li>
					</ul>
                    <div class="credits ml-auto pull-right">
                        <span class="copyright">
                            © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> for a better world
                        </span>
				    </div>
				</nav>
				
			</div>
		</div>
	</footer>

    
    <script src="/js/paper-kit-loan.js"></script>

    <!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
    

    <style>
        div#flashMessage.message {
            position: absolute;
            width: 100%;
            left: 0px;
            top: 75px;
            z-index: 99;
            text-align: center;
            padding: 10px;
            color: white;
            border-radius: 6px;
            background: #08708a;
        }

    </style>
    </body>
    </html>