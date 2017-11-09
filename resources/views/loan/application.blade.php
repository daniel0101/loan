@extends('layouts.front')
@section('content')

<div class="wrapper wrapper-full-page">
    <div class="full-page register-page" data-color="orange" data-image="/img/login-image.jpg">

    <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="header-text">
                            {{--  <h2>Application</h2>  --}}
                            <h4>Apply for free to get started</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                        <div class="media">
                            <div class="media-left">
                                <div class="icon">
                                    <i class="pe-7s-user"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h4>Free Account</h4>
                                Start your journey of getting the fund you need for free
                            </div>
                        </div>

                        <div class="media">
                            <div class="media-left">
                                <div class="icon">
                                    <i class="pe-7s-graph1"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h4>Awesome Performances</h4>
                                Intelligence built in for optimal experience

                            </div>
                        </div>

                        <div class="media">
                            <div class="media-left">
                                <div class="icon">
                                    <i class="pe-7s-headphones"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h4>Global Support</h4>
                                Loan that match global standard of transparency  and fairness
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 col-md-offset-s1">
                        <form method="POST" action="/application">
                            {{ csrf_field() }}
                            <div class="card card-plain">
                                <div class="content">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                       <label>Current Income Level <small>(Per Annum)</small></label> 
                                       <select class="form-control" name="income">
                                            <option value="less than 500K">less than 500K</option>
                                            <option value="less than 1M">less than 1M</option>
                                            <option value="less than 5M">less than 5M</option>
                                            <option value="less than 10M">less than 10M</option>
                                            <option value="less than 100M">less than 100M</option>
                                            <option value="greater than 100M">greater than 100M</option>
                                        </select>  
                                    </div>
                                    <div class="form-group">
                                        <label>Loan Amount</label>
                                        <input type="text" name="loan_amount" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Reason For Loan</label>
                                        <textarea class="form-control" name="reason"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Collateral</label>
                                        <select class="form-control" name="collateral">
                                            <option value="Building">Building</option>
                                            <option value="Company">Company</option>
                                            <option value="Reputation">Reputation</option>
                                            <option value="Land">Land</option>
                                            <option value="Car">Car</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-fill btn-info btn-wd">Apply</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <style>
        .card .form-group > label {
            color: #FFF;
        }
        </style>
@endsection        
