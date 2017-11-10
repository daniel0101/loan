@extends('layouts.admin')
@section('content')
	{{--  <div id="advanced_search" class="col-md-12 collapse" style="margin-top:15px;">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Advanced Search</h3>
			</div>
			<div class="panel-body">
				<form action="{{ route('loan.advanced_search') }}" class="form-inline" method="GET" role="form">
					<div class="form-group">
						<h4>Loan Amount(THB)</h4>
						
						<label>Min:</label>
						<input type="text" name="loan_amount_min" class="form-control" placeholder="10000">
						
						<label>Max:</label>
						<input type="text" name="loan_amount_max" class="form-control" placeholder="100000000">
					</div><br/>
					<div class="form-group">
						<h4>Loan Term(Years)</h4>
						
						<label class="control-label">Min:</label>
						<input type="text" name="loan_term_min" class="form-control" placeholder="1">
						
						<label class="control-label">Max:</label>
						<input type="text" name="loan_term_max" class="form-control" placeholder="50">
					</div><br/>
					<div class="form-group">
						<h4>Interest Rate(%)</h4>
						
						<label class="control-label">Min:</label>
						<input type="text" name="interest_rate_min" class="form-control" placeholder="1">
						
						<label class="control-label">Max:</label>
						<input type="text" name="interest_rate_max" class="form-control" placeholder="36">
					</div><br/><br/>
					<div class="form-group">
						<button type="submit" class="btn btn-default">Search</button>
					</div>
				</form>
			</div>
		</div>
	</div>  --}}
					<div class="col-md-12">
		 				<div class="card">
                            <div class="header">
                                <h4 class="title">All Applications </h4>
                                <p class="category">All loan applications for {{Auth::user()->name}} on the platform</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Loan Amount</th>
											<th>Income</th>
											<th>Collateral</th>
											<th>Reason for Loan</th>
											<th>Fuzzy Score</th>
											<th>Status</th>
											<th>Created at</th>
										</tr>
									</thead>
									<tbody>
										@foreach($applications as $i => $application)
										<tr>
											<td>{{ intval($i)+1 }}</td>
											<td> &#x20A6;{{ $application->loan_amount }} </td>
											<td>{{ $application->income }}</td>
											<td>{{ $application->collateral }}</td>
											<td>{{ $application->why}}</td>
											<td>{{ $application->fuzzy_score}}</td>
											<td>{{ $application->status}}</td>
											<td>{{ $application->created_at }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>		
	</div>
@endsection