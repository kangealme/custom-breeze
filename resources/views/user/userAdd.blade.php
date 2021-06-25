@extends('layouts.templates.main')

@section('title', 'Tambah Pengguna')

@section('content')
    <div class="container">
        <style>
        .card-horizontal {
        display: flex;
        flex: 1 1 auto;
        }
        </style>
        <form action="{{url('/penggunaAdd')}}" method="POST" class="user" enctype="multipart/form-data">
            @csrf
                <div class="container">
                    <div class="row"><h2>Tambah Pengguna</h2></div>
                    <div class="form-group mt-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mx-auto">
                                    <div class="card-horizontal">
                                        <div class="img-square-wrapper p-2">
                                            <img class="rounded mx-auto d-block" src="{{url('/assets/img/pengguna/default.png')}}" alt="Foto" id="preview">
                                            <input type="file" accept="image/*" name="foto" class="form-control mt-5" onchange="showMyImage(this)">
                                        </div>
                                        <div class="card-body" style="background-color:#A2DBFA">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="name"><strong>Nama</strong></label>
                                                    <input type="text" name="name" class="form-control @error('name')
                                                        is-invalid
                                                    @enderror" value="{{old('name')}}">
                                                    @error('name')
                                                        <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-6">
                                                    <label for="username"><strong>Username</strong></label>
                                                    <input type="text" name="username" class="form-control @error('username')
                                                        is-invalid
                                                    @enderror" value="{{old('username')}}">
                                                    @error('username')
                                                        <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-6">
                                                    <label for="email"><strong>Email</strong></label>
                                                    <input type="text" name="email" class="form-control @error('email')
                                                        is-invalid
                                                    @enderror" value="{{old('email')}}">
                                                    @error('email')
                                                        <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-6">
                                                    <label for="notelp"><strong>No. Telp</strong></label>
                                                    <input type="text" name="notelp" class="form-control @error('notelp')
                                                        is-invalid
                                                    @enderror" value="{{old('notelp')}}">
                                                    @error('notelp')
                                                        <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-12">
                                                    <label for="password"><strong>Password</strong></label>
                                                    <input type="password" name="password" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-12">
                                                    <label for="alamat"><strong>Alamat</strong></label>
                                                    <input type="text" name="alamat" class="form-control" value="{{old('alamat')}}">
                                                </div>
                                            </div>
                                            <div class="row mt-4 text-center">
                                                <div class="col-6">
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox"  name="is_admin" class="form-check-input">
                                                        <label for="is_admin" class="form-check-label">Admin</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox"  name="is_active" class="form-check-input">
                                                        <label for="is_active" class="form-check-label">Aktiv</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                    {{-- <small class="text-muted">Last updated 3 mins ago</small> --}}
                                        <div class="float-right">
                                            <button class="btn btn-success" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="{{url('/js/imgPrev.js')}}"></script>
@endsection
