@extends('layouts.admin')
@section('content')
                    <div class="col-md-12">
                        <div class="card">
                            <div class="content">
                                <h3>All Tickets Issued</span></h3>
								<div class="toolbar">
                                   
	                            </div>
                                <div class="fresh-datatables">
                					<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                						<thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Ticket Id</th>
                                                <th>Event Name</th>
                                                <th>Exipres</th>
                                                <th>created</th>
                                                <th class="disabled-sorting text-right">Actions</th>
                                            </tr>
                						</thead>
                						<tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Ticket Id</th>
                                                <th>Event Name</th>
                                                <th>Exipres</th>
                                                <th>created</th>
                                                <th class="disabled-sorting text-right">Actions</th>
                                            </tr>
                						</tfoot>
                						<tbody>
                                            <?php if(!empty($tickets)): foreach($tickets as $i => $ticket): ?>
                							<tr>
                								<td><?php echo $i+1 ?></td>
                								<td><?php echo $ticket['Ticket']['ticket_id'] ?></td>
                								<td><?php echo $ticket['Event']['name'] ?></td>
                								<td><?php echo $ticket['Ticket']['expires'] ?></td>
                								<td><?php echo $ticket['Ticket']['created'] ?></td>
                								<td class="text-right">
                									<a href="/files/<?php echo $ticket['Ticket']['ticket'] ?>" class="btn btn-simple btn-info btn-icon view" rel="tooltip" title="view ticket" target="_blank"><i class="fa fa-eye"></i></a>
                									<a href="/files/<?php echo $ticket['Ticket']['ticket'] ?>" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip" title="download" download><i class="fa fa-download"></i></a>
                									<a href="/admin/delete/Ticket/<?php echo $ticket['Ticket']['id'] ?>" class="btn btn-simple btn-danger btn-icon remove" rel="tooltip" title="delete"><i class="fa fa-times"></i></a>
                								</td>
                                            </tr>
                                            <?php endforeach; endif; ?>
                						</tbody>
                					</table>
                                </div>
                            </div><!-- end content-->
                        </div><!--  end card  -->
                    </div> <!-- end col-md-12 -->
@endsection