@extends('layouts.admin')

@section('content')
	
		<div class="col-md-6 col-md-offset-3">
			<div class="card">
				<div class="header">
                	<h4 class="title">Edit Loan <h4>
                </div>
                <div class="content">
					<form action="{{ route('loan.update', $loan->id) }}" method="POST" role="form" class="form-horizontal">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="PATCH">
						<div class="form-group {{ $errors->has('loan_amount') ? 'has-error' : '' }}">
							<label for="loan_amount" class="control-label col-md-4">Loan Amount: </label>
							<div class="col-md-8">
								<div class="input-group">
									<input type="text" class="form-control" name="loan_amount" aria-describedby="loan_amount" value="{{ old('loan_amount', floatval($loan->loan_amount)) }}">
									<span class="input-group-addon" id="loan_amount">&#x20A6;</span>
								</div>
								@if($errors->has('loan_amount'))
									<span class="help-block">{{ $errors->first('loan_amount') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('loan_term') ? 'has-error' : '' }}">
							<label for="loan_term" class="control-label col-md-4">Loan Term: </label>
							<div class="col-md-8">
								<div class="input-group">
									<input type="text" class="form-control" name="loan_term" aria-describedby="loan_term" value="{{ old('loan_term', $loan->loan_term) }}">
									<span class="input-group-addon" id="loan_term">Years</span>
								</div>
								@if($errors->has('loan_term'))
									<span class="help-block">{{ $errors->first('loan_term') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('interest_rate') ? 'has-error' : '' }}">
							<label for="interest_rate" class="control-label col-md-4">Interest Rate: </label>
							<div class="col-md-8">
								<div class="input-group">
									<input type="text" class="form-control" name="interest_rate" aria-describedby="interest_rate" value="{{ old('interest_rate', floatval($loan->interest_rate)) }}">
									<span class="input-group-addon" id="interest_rate">%</span>
								</div>
								@if($errors->has('interest_rate'))
									<span class="help-block">{{ $errors->first('interest_rate') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group {{ $errors->has('start_date') ? 'has-error' : 'start_date' }}">
							<label for="start_date" class="control-label col-md-4">Start Date: </label>
							<div class="col-md-8">
								<div class="input-group">
									<input type="text" id="start_date" class="form-control datepicker" name="start_date" aria-describedby="start_date" value="{{ old('start_date', $loan->repayment_schedule[0]->date->format('M Y')) }}">
									<span class="input-group-addon" id="start_date"><i class="glyphicon glyphicon-calendar"></i></span>
								</div>
								@if($errors->has('start_date'))
									<span class="help-block">{{ $errors->first('start_date') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-3 col-md-6">
								<button type="submit" class="btn btn-primary">Update</button>
								<a href="{{ route('loan.index') }}" class="btn btn-default">Back</a>
							</div>
						</div>
					</form>
				</div> <!-- end card content -->
			</div> <!-- end card -->
		</div> <!-- end grid col-md -->		
@endsection