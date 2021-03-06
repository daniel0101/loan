@extends('layouts.admin')
@section('content')
	
					<div class="col-md-12">
		 				<div class="card">
                            <div class="header">
                                <h4 class="title">Paybacks</h4>
                                <p class="category">All loan pay backs on the platform</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Amount</th>
											<th>Month</th>
											<th>Year</th>
											<th>Status</th>
											<th>Created</th>											
											<th>Action</th>											
										</tr>
									</thead>
									<tbody>
										@foreach($payments as $i => $payment)
										<tr>
											<td>{{ intval($i)+1 }}</td>
											<td> &#x20A6;{{ $payment->amount }} </td>
											<td>{{ $payment->month  }}</td>
											<td>{{ $payment->year  }}</td>
											<td>{{ $payment->status  }}</td>
											<td>{{ $payment->created_at  }}</td>
											<td>
                                                @if($payment->status == 'approved')
                                                    <a href="/disapprove/{{$payment->id}}" class="btn btn-danger"> Disapprove </a>
                                                @else
                                                    <a href="/approve/{{$payment->id}}" class="btn btn-info"> Approve </a>
                                                @endif
                                            </td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>		
	</div>
@endsection