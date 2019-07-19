@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Daftar Calon</div>

                    <div class="card-body">
                        <a href="{{ route('candidate.create') }}" class="btn btn-sm btn-primary" style="margin-bottom: 10px !important;">Buat pemilu</a>
                        <br>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($candidates as $k=>$candidate)
                                    <tr>
                                        <th scope="row">{{ $k + 1 }}</th>
                                        <td>{{ $candidate->name }}</td>
                                        <td>{{ $candidate->note }}</td>
                                        <td>
                                            <form method="post" action="{{ route("candidate.destroy",$candidate->id) }}">
                                                <a href="{{ route('candidate.show',$candidate->id) }}" class="btn btn-sm btn-warning">Show</a>
                                                <a href="{{ route('candidate.edit',$candidate->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <input type="hidden" name="_method" value="delete">
                                                @csrf
                                                <input type="submit" value="Hapus" class="btn btn-sm btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
