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
                                <h4 class="title">All Your Loans <span class="text-info">{{ Auth::user()->name}}</span></h4>
                                <p class="category">All loans approved on the platform</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Loan Amount</th>
											<th>Loan Term</th>
											<th>Interest Rate</th>
											<th>Created at</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($loans as $i => $loan)
										<tr>
											<td>{{ $i+1 }}</td>
											<td> &#x20A6;{{ number_format($loan->loan_amount, 2) }} </td>
											<td>{{ $loan->loan_term }} Years</td>
											<td>{{ number_format($loan->interest_rate, 2) }}%</td>
											<td>{{ $loan->created_at }}</td>
											<td>
												<a href="{{ route('loan.show', $loan->id) }}" class="btn btn-info">View</a>
												{{--  <a href="{{ route('loan.edit', $loan->id) }}" class="btn btn-success">Edit</a>
												<form action="{{ route('loan.destroy', $loan->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure ?')">
													{{ csrf_field() }}
													<input type="hidden" name="_method" value="DELETE">
													<button type="submit" class="btn btn-danger">Delete</button>
												</form>  --}}
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
	</div>
@endsection