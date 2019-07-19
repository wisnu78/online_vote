@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                                <div class="row">
                                    @foreach($candidate->users as $user)
                                        <div class="col-md-4">
                                            <h4>{{ $user->name }}</h4>
                                            Total Vote &nbsp;<b>{{ $user->pivot->vote }}</b>
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                                <input type="submit" value="Vote" class="btn btn-sm btn-primary">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
