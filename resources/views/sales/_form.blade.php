<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Sales Form @if ($sale)
      <b>{{ $sale->sales_id }}</b>
    @endif</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <div class="box-body">
    <div class="form-group">
      {!! Form::label('customer_id', 'Customer', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::select('customer_id',[''=>'---']+$customer_list, null, ['class'=>'form-control', 'id'=>'customer_id']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('voucher_id', 'Voucher',['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::select('voucher_id', $voucher_list, null, ['class'=>'form-control', 'id'=>'voucher_id']) !!}
      </div>
    </div>
    
    <div class="form-group">
      {!! Form::label('customer_name', 'Username', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('customer_name', null, ['class'=>'form-control', 'id'=>'customer_name']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('customer_password', 'Password', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('customer_password', null, ['class'=>'form-control', 'id'=>'customer_password']) !!}
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-default">Cancel</button>
    <button type="submit" class="btn btn-info pull-right">Save</button>
  </div>
  <!-- /.box-footer -->
</div>

