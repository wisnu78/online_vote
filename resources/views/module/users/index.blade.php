@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Daftar user</div>

                    <div class="card-body">
                        <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary" style="margin-bottom: 10px !important;">Tambah User</a>
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
                                @foreach($users as $k=>$user)
                                    <tr>
                                        <th scope="row">{{ $k + 1 }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <form action="{{ route("user.destroy",$user->id) }}">
                                                <a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
