@extends('layouts.admin')
@section('content')
	
					<div class="col-md-12">
		 				<div class="card">
                            <div class="header">
                                <h4 class="title">Monitors</h4>
                                <p class="category">All loan tracked on the platform</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Loan Amount</th>
											<th>Amount Paid</th>
											<th>Balance</th>
											<th>Last Payment Date</th>
											<th>Created</th>											
											<th></th>											
										</tr>
									</thead>
									<tbody>
                                    @if($loans) 
										@foreach($loans as $i => $loan)
										<tr>
											<td>{{ $i+1 }}</td>
											<td> {{ intval($loan->loan_amount) }} </td>
											<td>{{ isset($loan->monitor->amount_paid) && !empty($loan->monitor->amount_paid) ? $loan->monitor->amount_paid: 'Nil'  }}</td>
											<td>{{ isset($loan->monitor->unpaid_balance) && !empty($loan->monitor->unpaid_balance)  !=null? $loan->monitor->unpaid_balance : 'Nil' }}</td>
											<td>{{  isset($loan->monitor->date_paid) && !empty($loan->monitor->date_paid) != null ? $loan->monitor->date_paid : 'Nil' }}</td>
											<td>{{ $loan->created_at != null ? $loan->created_at : 'Nil'  }}</td>											
											<td></td>											
										</tr>
										@endforeach
                                    @else
                                        <tr>
                                            <h3>We are not Tracking any loan at this time</h3>
                                        </tr>
                                    @endif    
									</tbody>
								</table>
							</div>
						</div>		
	</div>
@endsection