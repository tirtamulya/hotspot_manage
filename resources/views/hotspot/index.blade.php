@extends('layout.admin')

@section('content')
	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title">
				.:Hotspot's Data
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
		         	<a href="{{ route('hotspot.create') }}" class="btn btn-primary">
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
      		{!! Form::open(['route'=>'hotspot.delete', 'id'=>'formCustomer']) !!}
				<table id="tableCustomer" class="table table-striped table-color">
					<thead>
						<tr>
							<th data-sortable="false"><input type="checkbox" id="check_all"/></th>
							<th>Hotspot Id.</th>
	            			<th>Name</th>
	            			<th>Address</th>
	            			<th>Phone</th>
	            			<th>IP Address</th>
	            			<th>Port</th>
	            			<th>Action</th>
						</tr>
					</thead>
					<tbody>
	          			@foreach ($hotspot as $h)
						<tr>
							<td>
								<input type="checkbox" id="idTableCustomer" value="{{ $h->id }}" name="id[]" class="checkin">
							</td>
							<td>{{ $h->hotspot_id }}</td>
							<td>{{ $h->name }}</td>
							<td>{{ $h->address }}</td>
							<td>{{ $h->phone }}</td>
							<td>{{ $h->ip_address }}</td>
							<td>{{ $h->print_port }}</td>
							<td>
								<a href="{{ route('hotspot.edit', $h->id) }}" class="btn btn-default btn-xs">
									<i class="fa fa-pencil-square"></i> Edit
								</a>
							</td>
						</tr>
						@endforeach
	        		</tbody>
				</table>
      		{!! Form::close() !!}
		</div>
	</div>
	@include('customer._modal')
@stop