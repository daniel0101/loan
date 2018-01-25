@extends('layouts.home') 

@section('content')
    <div class="welcome">
            <div class="filter"></div>
        <div class="container">
            <div class="row">
                <div class="main-text">
                    <h2 class="title">Welcome to Loan Managers</h2>
                    <h4 class="description">We have got the best and most relaible loan plans and packages for you. Our Fuzzy based system makes the loan process seamless</h4>
                    
                </div>
                <div class="buttons">
                    <a class="btn btn-danger" href="/application">Apply For Loan</a>
                    @if(Auth::user()->email =='admin@lms.com')
                    <a class="btn btn-info" href="/dashboard">Go to dashboard</a>
                    @else
                    <a class="btn btn-info" href="/userloans">Go to dashboard</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
   <style>
       .welcome{
           background-image: url('/img/ilya-yakover.jpg');
           background-position: initial;
           background-size: cover;
           height: 90vh;
       }
       h2.title{
            color: #fbb2b2;
       }
       .main-text{
           margin-top: 150px;
           width: 100%;
       }
       h4.description{
           color: #FFF;
       }
       .buttons{
           margin-top: 10em;
           text-align: center;
       }
   </style>