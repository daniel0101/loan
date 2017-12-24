@extends('layouts.admin')
@section('content')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Payment</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="/payments">
                                    {{ csrf_field()}}
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="id" value="{{ @isset($payment)? $payment->id :''}}">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Amount</label>
                                                <input type="text" name="amount" class="form-control" placeholder="Amount" value=" {{ @isset($payment)? intval($payment->amount) :''}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Account Number <small style="text-transform: lowercase;">eg 0123764521</small></label>
                                                <input type="number" name="account_number" class="form-control" value="{{ @isset($payment)? $payment->account_number :''}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Bank</label>
                                                <input type="text" name="bank" class="form-control" placeholder="Bank name eg GTBank" value=" {{ @isset($payment)? $payment->bank :''}}" required>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Month</label>
                                                <input type="text" name="month" class="form-control" placeholder="January" value="{{ @isset($payment)? $payment->month :''}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Year</label>
                                                <input type="text" name="year" class="form-control" placeholder="2017" value=" {{ @isset($payment)? $payment->year :''}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Select Serviced Loan</label>
                                                <select class="form-control" name="loan_id">
                                                    @foreach($loans as $loan)
                                                    <option value="{{ intval($loan->id) }}">{{ intval($loan->loan_amount) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>    
                                        </div>
                                    </div>                                
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Submit for Approval</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{--  <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/>

                                      <h4 class="title">Mike Andrew<br />
                                         <small>michael24</small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> "Lamborghini Mercy <br>
                                                    Your chick she so thirsty <br>
                                                    I'm in that two seat Lambo"
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>  --}}

                </div>
            </div>
        </div>
@endsection