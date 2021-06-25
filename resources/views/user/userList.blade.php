@extends('layouts.templates.main')

@section('title', 'Daftar Pengguna')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Daftar Pengguna</h2>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-12">
                @if (Session::get('pesan'))
                    <div class="alert alert-success">{{Session::get('pesan')}}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">USERNAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">NO TELP</th>
                            <th scope="col">ADMIN</th>
                            <th scope="col">AKTIF</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->notelp}}</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="is_admin" class="form-check-input"
                                        @if ($user->is_admin)
                                            checked
                                        @endif disabled>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="is_active" class="form-check-input"
                                        @if ($user->is_active)
                                            checked
                                        @endif disabled>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{url('/penggunaEdit').'/'.$user->id}}" class="badge bg-warning">Edit</a>
                                    <form action="{{url('/penggunaHapus').'/'.$user->id}}" class="d-inline" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="badge bg-danger" type="submit">Hapus</button>
                                    </form>
                                    <a href="{{url('/penggunaProfil').'/'.$user->id}}" class="badge bg-success">Profil</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
