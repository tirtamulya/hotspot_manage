<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">User Form</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <div class="box-body">
    <div class="form-group">
      {!! Form::label('name', 'Name', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name', 'placeholder'=>'Name']) !!}
      </div>
    </div>
    <div class="form-group">
      {!! Form::label('email', 'Email',['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('email', null, ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'Email']) !!}
      </div>
    </div>
    @if ($edit)
    <div class="form-group">
      {!! Form::label('password', 'Password', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::password('password', ['class'=>'form-control']) !!}
      </div>
    </div>
    <div class="form-group">
      {!! Form::label('password-confirm', 'Confirm Password',['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::password('password_confirmation', ['class'=>'form-control','id'=>'password-confirm']) !!}    
      </div>
    </div>
    @else
    <div class="form-group">
      {!! Form::label('password', 'Password', ['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::password('password', ['class'=>'form-control','required']) !!}
      </div>
    </div>
    <div class="form-group">
      {!! Form::label('password-confirm', 'Confirm Password',['class'=>'col-sm-2 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::password('password_confirmation', ['class'=>'form-control','id'=>'password-confirm','required']) !!}    
      </div>
    </div>
    @endif
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