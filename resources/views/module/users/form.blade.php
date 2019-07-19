<div class="form-group">
    <label for="">Nama</label>
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group">
    <label for="">NPM</label>
    {!! Form::text('email', null, ['class'=>'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group">
    <label for="">Jenis Kelamin</label>
    {!! Form::select('gender', ['1'=>'Laki-laki','0'=>'Perempuan'],null, ['class'=>'form-control']) !!}
    {!! $errors->first('gender', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group">
    <label for="">Tipe User</label>
    {!! Form::select('role', $roles,null, ['class'=>'form-control']) !!}
    {!! $errors->first('role', '<p class="help-block text-danger">:message</p>') !!}
</div>

<div class="row text-right">
    <div class="col-md-12">
        <button class="btn btn-sm btn-primary" type="submit">Submit</button>
    </div>
</div>