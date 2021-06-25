@extends('layouts.templates.template')

@section('title','Login')

@section('content')
      <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <div class="text-center">
                                        @if ($pesan = Session::get('pesan'))
                                            <div class="alert alert-success">{{$pesan}}</div>
                                        @endif
                                    </div>
                                    <form class="user" action="{{url('/login')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('username')
                                                is-invalid
                                            @enderror"
                                                id="username" name="username"
                                                placeholder="Masukkan Username" value="{{old('username')}}">
                                                @error('username')
                                                    <div class="invalid-feedback ml-2">{{$message}}</div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user @error('password')
                                                is-invalid
                                            @enderror"
                                                id="password" name="password" placeholder="Masukkan Password">
                                                @error('password')
                                                    <div class="invalid-feedback ml-2">{{$message}}</div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{url('/register')}}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
