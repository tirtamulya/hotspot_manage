<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Hotspot Form</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <div class="box-body">
    <div class="form-group">
      {!! Form::label('name', 'Name', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('name',null, ['class'=>'form-control', 'id'=>'name']) !!}
      </div>
    </div>
    <div class="form-group">
      {!! Form::label('address', 'Address', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::textarea('address', null, ['class'=>'form-control', 'id'=>'address','rows'=>'3']) !!}
      </div>
    </div>
    <div class="form-group">
      {!! Form::label('phone', 'Phone', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('phone', null, ['class'=>'form-control', 'id'=>'phone']) !!}
      </div>
    </div>
    <div class="form-group">
      {!! Form::label('ip_address', 'IP Address', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('ip_address', null, ['class'=>'form-control', 'id'=>'ip_address']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('print_port', 'Printer Port', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('print_port', null, ['class'=>'form-control', 'id'=>'print_port']) !!}
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

