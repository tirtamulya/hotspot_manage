@extends('layout.admin')

@section('content')
	<div class="box box-default">
		<div class="box-header">
			<h3 class="box-title">
				.:Radius Accounting Data's
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
		          	{{-- <button type="button" class="btn btn-danger" onclick="DeleteUser()">
		            	<i class="fa fa-trash" aria-hidden="true"></i> Delete
		          	</button> --}}
		          	<span style="margin-left: 10px;">
		            	<i class="fa fa-filter" aria-hidden="true"></i> Filter
		          	</span>
		        </div>

        		<div class="col-md-4">
          			<input type="text" id="searchDtbox" class="form-control" placeholder="search...">
        		</div>
      		</div>
      		{!! Form::open(['route'=>'radius.accounting.delete', 'id'=>'formAccouting']) !!}
				<table id="tableUser" class="table table-striped table-color">
					<thead>
						<tr>
							<th data-sortable="false"><input type="checkbox" id="check_all"/></th>
	            			<th>radacctid</th>
	            			<th>acctsessionid</th>
	            			<th>acctuniqueid</th>
	            			<th>username</th>
	            			<td>groupname</td>
	            			<td>realm</td>
	            			<td>nasipaddress</td>
	            			<td>nasportid</td>
	            			<td>nasporttype</td>
	            			<td>acctstarttime</td>
	            			<td>acctstoptime</td>
	            			<td>acctsessiontime</td>
	            			<td>acctauthentic</td>
	            			<td>connectinfo_start</td>
	            			<td>connectinfo_stop</td>
	            			<td>acctinputoctets</td>
	            			<td>acctoutputoctets</td>
	            			<td>calledstationid</td>
	            			<td>callingstationid</td>
	            			<td>acctterminatecause</td>
	            			<td>servicetype</td>
	            			<td>framedprotocol</td>
	            			<td>framedipaddress</td>
	            			<td>acctstartdelay</td>
	            			<td>acctstopdelay</td>
	            			<td>xascendsessionsvrkey</td>
						</tr>
					</thead>
					<tbody>
	          			@foreach ($accounting as $a)
						<tr>
							<th>{{ $a->radacctid }}</th>
	            			<th>{{ $a->acctsessionid }}</th>
	            			<th>{{ $a->acctuniqueid }}</th>
	            			<th>{{ $a->username }}</th>
	            			<td>{{ $a->groupname }}</td>
	            			<td>{{ $a->realm }}</td>
	            			<td>{{ $a->nasipaddress }}</td>
	            			<td>{{ $a->nasportid }}</td>
	            			<td>{{ $a->nasporttype }}</td>
	            			<td>{{ $a->acctstarttime }}</td>
	            			<td>{{ $a->acctstoptime }}</td>
	            			<td>{{ $a->acctsessiontime }}</td>
	            			<td>{{ $a->acctauthentic }}</td>
	            			<td>{{ $a->connectinfo_start }}</td>
	            			<td>{{ $a->connectinfo_stop }}</td>
	            			<td>{{ $a->acctinputoctets }}</td>
	            			<td>{{ $a->acctoutputoctets }}</td>
	            			<td>{{ $a->calledstationid }}</td>
	            			<td>{{ $a->callingstationid }}</td>
	            			<td>{{ $a->acctterminatecause }}</td>
	            			<td>{{ $a->servicetype }}</td>
	            			<td>{{ $a->framedprotocol }}</td>
	            			<td>{{ $a->framedipaddress }}</td>
	            			<td>{{ $a->acctstartdelay }}</td>
	            			<td>{{ $a->acctstopdelay }}</td>
	            			<td>{{ $a->xascendsessionsvrkey }}</td>
						</tr>
						@endforeach
	        		</tbody>
				</table>
      		{!! Form::close() !!}
		</div>
	</div>
@stop