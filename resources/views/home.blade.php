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
                       @if($vote == null)
                        <form action="{{ route("vote.store") }}" method="post">
                            @csrf
                            <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                            <div class="row">
                                @foreach($candidate->users as $user)
                                    <div class="col-md-4">
                                        <h4>{{ $user->name }}</h4>
                                        <input type="radio" value="{{ $user->id }}" name="vote">
                                    </div>
                                @endforeach
                            </div>
                            <br>
                            <input type="submit" value="Vote" class="btn btn-sm btn-primary">
                        </form>
                      @else
                           <h1>Tidak ada pemilu</h1>
                       @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
