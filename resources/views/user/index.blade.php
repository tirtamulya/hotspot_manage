@extends('layout.admin')

@section('content')
	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title">
				.:User Data's
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
		         	<a href="{{ route('user.create') }}" class="btn btn-primary">
		            	<i class="fa fa-plus-circle" aria-hidden="true"></i> New
		          	</a>
		          	<button type="button" class="btn btn-danger" onclick="DeleteUser()">
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
      		{!! Form::open(['route'=>'user.delete', 'id'=>'formOutlet']) !!}
				<table id="tableUser" class="table table-striped table-color">
					<thead>
						<tr>
							<th data-sortable="false"><input type="checkbox" id="check_all"/></th>
							<th>Username</th>
	            			<th>Name</th>
	            			<th>Email</th>
	            			<th>Hotspot</th>
	            			<th>Action</th>
						</tr>
					</thead>
					<tbody>
	          			@foreach ($user as $u)
						<tr>
							<td>
								<input type="checkbox" id="idTableUser" value="{{ $u->id }}" name="id[]" class="checkin">
							</td>
							<td>{{ $u->username }}</td>
							<td>{{ $u->name }}</td>
							<td>{{ $u->email }}</td>
							<td>{{ $u->hotspot->name }}</td>
							<td>
								<a href="{{ route('user.edit', $u->id) }}" class="btn btn-default btn-xs">
									<i class="fa fa-pencil-square"></i> Edit
								</a>
								@if (!$u->active)
									<a href="#" class="btn btn-xs btn-danger" onclick="active('{{ $u->id }}')">Deactive</a>
								@else
									<a href="#" class="btn btn-xs btn-primary" onclick="active('{{ $u->id }}')">Active</a>
								@endif
							</td>
						</tr>
						@endforeach
	        		</tbody>
				</table>
      		{!! Form::close() !!}
		</div>
	</div>
	@include('user._modal')
@stop