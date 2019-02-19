<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Customer Form</h3>
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
      {!! Form::label('email', 'Email',['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('email', null, ['class'=>'form-control', 'id'=>'email']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('address', 'Address', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::textarea('address', null, ['class'=>'form-control', 'id'=>'address']) !!}
      </div>
    </div>
    <div class="form-group">
      {!! Form::label('phone', 'Phone', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('phone', null, ['class'=>'form-control', 'id'=>'phone']) !!}
      </div>
    </div>
    <div class="form-group">
      {!! Form::label('birthday', 'BirthDay', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('birthday', null, ['class'=>'form-control', 'id'=>'birthday']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('birthday_place', 'BirthDay Place', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('birthday_place', null, ['class'=>'form-control', 'id'=>'birthday_place']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('gender', 'Gender', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::select('gender', ['male'=>"Male", 'female'=>'Female'], null, ['class'=>'form-control', 'id'=>'gender']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('type_id', 'Type', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::select('type_id', $type_list, null, ['class'=>'form-control', 'id'=>'type_id']) !!}
      </div>
    </div>
    <div class="form-group">
      {!! Form::label('hotspot', 'Hotspot',['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::select('hotspot_id', $hotspot_list, null, ['class'=>'form-control', 'id'=>'hotspot_id']) !!}
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

