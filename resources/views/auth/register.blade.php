@extends('layouts.front')

@section('content')
    {{--  <div class="wrapper">
        <div class="page-header" style="background-image: url('/img/login-image.jpg');">
            <div class="container">
            <div class="row">
                        <div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3">
                            <div class="card card-register">
                                <h3 class="title">Register</h3>
                                <form class="register-form" role="form" method="POST" action="{{ url('/register') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label>Name</label>
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label>E-Mail Address</label>

                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                                            <label >Confirm Password</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    <button class="btn btn-danger btn-block btn-round">Register</button>
                                </form>
                                <div class="forgot">
                                    <a href="#" class="btn btn-link btn-danger">Forgot password?</a>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>         --}}
        <div class="wrapper wrapper-full-page">
            <div class="full-page login-page" data-color="orange" data-image="/img/full-screen-image-1.jpg">   
                <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
                <div class="content">
                    <div class="container">
                        <div class="row">                   
                            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                                <form method="POST" action="{{ url('/register') }}">
                                    
                                <!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                                    <div class="card">
                                        <div class="header text-center">Register</div>
                                        <div class="content">
                                            {{ csrf_field() }}
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label>Name</label>
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label>E-Mail Address</label>

                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                                            <label >Confirm Password</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                        </div>
                                        <div class="footer text-center">
                                            <button type="submit" class="btn btn-fill btn-warning btn-wd">Register</button> 
                                        </div>
                                    </div>
                                        
                                </form>
                                        
                            </div>                    
                        </div>
                </div>
        </div>            
@endsection
