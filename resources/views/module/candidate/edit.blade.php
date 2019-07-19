@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Daftar user</div>
                    <div class="card" style="padding: 20px !important;">
                        <?php $method = "Simpan"; ?>
                        {!! Form::model($candidate, ['url' => route('candidate.update', $candidate->id),'method'=>'put','files'=>'true', 'class'=>'form-horizontal']) !!}
                        @include('module.candidate.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
