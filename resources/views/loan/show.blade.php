@extends('layouts.admin')
@section('content')
	<div class="col-md-12">
		<div class="card">
			<div class="header">
                <h4 class="title">Loan Details</h4>
                <p class="category">Details for this loan</p>
            </div>
			<div class="content table-responsive table-full-width">
				<table class="table">
					<tr>
						<th style="width:15%;">ID:</th>
						<td>{{ number_format($loan->id) }}</td>
					</tr>
					<tr>
						<th>Loan Amount:</th>
						<td>{{ number_format($loan->loan_amount, 2) }} &#x20A6;</td>
					</tr>
					<tr>
						<th>Loan Term:</th>
						<td>{{ $loan->loan_term }} Years</td>
					</tr>
					<tr>
						<th>Interest Rate:</th>
						<td>{{ number_format($loan->interest_rate, 2) }}%</td>
					</tr>
					<tr>
						<th>Created at:</th>
						<td>{{ $loan->created_at }}</td>
					</tr>
				</table>
				@if(Auth::user()->email == 'admin@lms.com')
					<a href="{{ route('loan.index') }}" class="btn btn-default">Back</a>
				@else
					<a href="/userloans" class="btn btn-default">Back</a>
				@endif
			</div>
		</div>		
	</div>
	<div class="col-md-12">
		<div class="card">
            <div class="header">
                <h4 class="title">Repayment Schedule</h4>
                <p class="category">repayment schedule for this loan</p>
            </div>
        	<div class="content table-responsive table-full-width">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Payment No</th>
							<th>Date</th>
							<th>Payment Amount</th>
							<th>Principal</th>
							<th>Interest</th>
							<th>Balance</th>
						</tr>
					</thead>
					<tbody>
						@foreach($loan->repayment_schedule as $repayment_schedule)
						<tr>
							<td>{{ $repayment_schedule->payment_no }}</td>
							<td>{{ $repayment_schedule->date->format('M Y') }}</td>
							<td>{{ number_format($repayment_schedule->payment_amount, 2) }}</td>
							<td>{{ number_format($repayment_schedule->principal, 2) }}</td>
							<td>{{ number_format($repayment_schedule->interest, 2) }}</td>
							<td>{{ number_format($repayment_schedule->balance, 2) }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@if(Auth::user()->email == 'admin@lms.com')
					<a href="{{ route('loan.index') }}" class="btn btn-default">Back</a>
				@else
					<a href="/userloans" class="btn btn-default">Back</a>
				@endif
			</div>
		</div>		
	</div>
@endsection