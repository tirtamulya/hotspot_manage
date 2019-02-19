<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Voucher Form</h3>
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
      {!! Form::label('type_id', 'Type', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::select('type_id',$type_list, null, ['class'=>'form-control', 'id'=>'name']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('price', 'Price',['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('price', null, ['class'=>'form-control', 'id'=>'price']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('radius_type', 'Radius', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::select('radius_type', $radius_setting, null,  ['class'=>'form-control', 'id'=>'radius_type']) !!}
      </div>
    </div>
    <div class="form-group">
      {!! Form::label('radius_value', 'Value', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('radius_value', null, ['class'=>'form-control', 'id'=>'radius_value']) !!}
      </div>
    </div>
    <div class="form-group">
      {!! Form::label('description', 'Description', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::textarea('description', null, ['class'=>'form-control', 'id'=>'description']) !!}
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

