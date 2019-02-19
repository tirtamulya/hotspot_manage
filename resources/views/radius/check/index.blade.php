@extends('layout.admin')

@section('content')
	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title">
				.:RadCheck's Data
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
      		{!! Form::open(['route'=>'radius.check.delete', 'id'=>'formRadius']) !!}
				<table id="tableCustomer" class="table table-striped table-color">
					<thead>
						<tr>
							<th data-sortable="false"><input type="checkbox" id="check_all"/></th>
							<th>Username</th>
	            			<th>Attribute</th>
	            			<th>Op</th>
	            			<th>Value</th>
	            			<th>Hotspot</th>
	            			<th>Start Time</th>
						</tr>
					</thead>
					<tbody>
	          			@foreach ($check as $c)
						<tr>
							<td>
								<input type="checkbox" id="idTableRadius" value="{{ $c->id }}" name="id[]" class="checkin">
							</td>
							<td>{{ $c->username }}</td>
							<td>{{ $c->attribute }}</td>
							<td>{{ $c->op }}</td>
							<td>{{ $c->value }}</td>
							@php
								$sale = App\Sale::where('customer_name', $c->username)->first();
							@endphp
							<td>
								@if ($sale)
									{{ $sale->hotspot }}
								@endif
							</td>
							<td>
								@if ($c->accounting()->count() > 0)
									{{ date('d F Y H:i:s', strtotime($c->accounting()->min('acctstarttime'))) }}
								@else 
								-
								@endif
							</td>
						</tr>
						@endforeach
	        		</tbody>
				</table>
      		{!! Form::close() !!}
		</div>
	</div>
@stop