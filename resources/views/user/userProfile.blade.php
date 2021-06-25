@extends('layouts.templates.main')

@section('title', 'Profil User')

@section('content')
    <style>
        .card-horizontal {
        display: flex;
        flex: 1 1 auto;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Profil Pengguna</h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-horizontal">
                        <div class="img-square-wrapper">
                            <img class="" src="{{url('/assets/img/pengguna/'.$user->foto)}}" alt="Card image cap" style="max-width: 300px;min-width:150px;">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{$user->name}}</h4>
                            <p class="card-text">{{$user->email}}</p>
                            <p class="card-text">{{$user->notelp}}</p>
                            <p class="card-text">{{$user->alamat}}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{-- <small class="text-muted">Last updated 3 mins ago</small> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
