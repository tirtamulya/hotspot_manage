@extends('layout.admin')

@section('content')
	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title">
				.:Sales's Data
			</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove">
					<i class="fa fa-remove"></i>
				</button>
			</div>
		</div>

		<div class="box-body">
			<div class="col-md-12 box-body-header">  
		        <div class="col-md-8">
		         	<a href="{{ route('sales.create') }}" class="btn btn-primary">
		            	<i class="fa fa-plus-circle" aria-hidden="true"></i> New
		          	</a>
		          	<button type="button" class="btn btn-danger" onclick="Delete()">
		            	<i class="fa fa-trash" aria-hidden="true"></i> Delete
		          	</button>
		          	<span style="margin-left: 10px;">
		            	<i class="fa fa-filter" aria-hidden="true"></i> Filter
		          	</span>
		        </div>

        		<div class="col-md-4">
          			<input type="text" id="searchDtbox" class="form-control" placeholder="search...">
        		</div>
      		</div>
      		{!! Form::open(['route'=>'sales.delete', 'id'=>'formSales']) !!}
				<table id="tableCustomer" class="table table-striped table-color">
					<thead>
						<tr>
							<th data-sortable="false"><input type="checkbox" id="check_all"/></th>
							<th>Sales No.</th>
	            			<th>Voucher</th>
	            			<th>Customer</th>
	            			<th>Amount</th>
	            			<th>Username</th>
	            			<th>Password</th>
	            			<th>Hotspot</th>
	            			<th>Action</th>
						</tr>
					</thead>
					<tbody>
	          			@foreach ($sales as $s)
						<tr>
							<td>
								<input type="checkbox" id="idTableSales" value="{{ $s->id }}" name="id[]" class="checkin">
							</td>
							<td>{{ $s->sales_id }}</td>
							<td><b>{{ $s->voucher_id }} | {{ $s->voucher->name }}</b></td>
							<td>
								@if ($s->customer()->count() > 0)
									{{ $s->customer->name }}
								@else 

								@endif
							</td>
							<td>{{ number_format($s->sales_amount) }}</td>
							<td>{{ $s->customer_name }}</td>
							<td>{{ $s->customer_password }}</td>
							<td>{{ $s->hotspot_id }}</td>
							<td>
								<a href="{{ route('sales.edit', $s->id) }}" class="btn btn-default btn-xs">
									<i class="fa fa-pencil-square"></i> Edit
								</a>

								<a href="{{ route('sales.print', $s->id) }}" class="btn btn-default btn-xs">
									<i class="fa fa-pencil-square"></i> Print
								</a>
							</td>
						</tr>
						@endforeach
	        		</tbody>
				</table>
      		{!! Form::close() !!}
		</div>
	</div>
@stop