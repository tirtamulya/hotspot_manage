<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Horizontal Form</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <div class="box-body">
    <div class="form-group">
      <label for="username" class="col-sm-2 control-label">Username</label>
      <div class="col-sm-6">
        <input type="username" class="form-control" id="username" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-6">
        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
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
    <button type="submit" class="btn btn-info pull-right">Sign in</button>
  </div>
  <!-- /.box-footer -->
</div>