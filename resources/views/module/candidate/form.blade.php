<div class="form-group">
    <label for="">Name</label>
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group">
    <label for="">Note</label>
    {!! Form::text('note', null, ['class'=>'form-control']) !!}
    {!! $errors->first('note', '<p class="help-block text-danger">:message</p>') !!}
</div>

<div class="form-group">
    <label for="">Calon</label>
    {!! Form::select('users[]', $users,null, ['class'=>'form-control select2','multiple'=>true]) !!}
    {!! $errors->first('users', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group">
    <label for="">Status</label>
    {!! Form::select('status', ['1'=>'Aktif','0'=>'Tidak aktif'],null, ['class'=>'form-control select2']) !!}
    {!! $errors->first('status', '<p class="help-block text-danger">:message</p>') !!}
</div>

<div class="row text-right">
    <div class="col-md-12">
        <button class="btn btn-sm btn-primary" type="submit">Submit</button>
    </div>
</div>