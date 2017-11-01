@extends('layouts.front')

@section('content')
 {{--  <div class="wrapper">
        <div class="page-header" style="background-image: url('/img/login-image.jpg');">
    <div class="container">
        <div class="row">
        <div class="card card-register">
                <h3 class="title">Login</h3>
                                <form class="register-form" role="form" method="POST" action="{{ url('/login') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label>E-Mail Address</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label>Password</label>
                                            <input id="password" type="password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                                </label>
                                            </div>
                                    </div>
                                </form>
                                <div class="forgot">
                                    <button class="btn btn-danger btn-block btn-round">Login</button>
                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>          --}}
        <div class="wrapper wrapper-full-page">
            <div class="full-page login-page" data-color="orange" data-image="/img/full-screen-image-1.jpg">   
        
            <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
                <div class="content">
                    <div class="container">
                        <div class="row">                   
                            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                                <form method="POST" action="{{ url('/login') }}">
                                    
                                <!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                                    <div class="card">
                                        <div class="header text-center">Login</div>
                                        <div class="content">
                                            {{ csrf_field() }}
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label>E-Mail Address</label>
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label>Password</label>
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>                                    
                                            <div class="form-group">
                                                <label class="checkbox">
                                                    <input type="checkbox" data-toggle="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}} value="">
                                                    remember me
                                                </label>    
                                            </div>
                                        </div>
                                        <div class="footer text-center">
                                            <button type="submit" class="btn btn-fill btn-warning btn-wd">Login</button> 
                                            <p class="text-danger" style="margin-top:30px;">Don't Have an Account? <a href="{{url('/register')}}"> Click here</a></p>
                                        </div>
                                    </div>
                                        
                                </form>
                                        
                            </div>                    
                        </div>
                </div>
        </div>            
@endsection
