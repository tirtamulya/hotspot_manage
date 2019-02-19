@extends('layout.admin')

@section('content')
	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title">
				.:Voucher's Data
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
		         	<a href="{{ route('voucher.create') }}" class="btn btn-primary">
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
      		{!! Form::open(['route'=>'voucher.delete', 'id'=>'formCustomer']) !!}
				<table id="tableCustomer" class="table table-striped table-color">
					<thead>
						<tr>
							<th data-sortable="false"><input type="checkbox" id="check_all"/></th>
							<th>Voucher ID</th>
	            			<th>Name</th>
	            			<th>Price</th>
	            			<th>Radius Attribute</th>
	            			<th>Radius Value</th>
	            			<th>Action</th>
						</tr>
					</thead>
					<tbody>
	          			@foreach ($vouchers as $v)
						<tr>
							<td>
								<input type="checkbox" id="idTableVouvher" value="{{ $v->id }}" name="id[]" class="checkin">
							</td>
							<td>{{ $v->voucher_id }}</td>
							<td>{{ $v->name }}</td>
							<td>{{ number_format($v->price) }}</td>
							<td>{{ $v->radius_type }}</td>
							<td>{{ $v->radius_value }}</td>
							<td>
								<a href="{{ route('voucher.edit', $v->id) }}" class="btn btn-default btn-xs">
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