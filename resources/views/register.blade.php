@extends('auth.template')

@section('title','Registrasi Pengguna')

@section('content')
     <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Pengajuan Pengguna</h1>
                                    </div>
                                    <form action="{{url('/register')}}" method="post" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('name')
                                                is-invalid
                                            @enderror" id="name" name="name"
                                                placeholder="Nama" value="{{old('name')}}">
                                                @error('name')
                                                    <div class="invalid-feedback ml-2">{{$message}}</div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('username')
                                                is-invalid
                                            @enderror" id="username" name="username"
                                                placeholder="Username" value="{{old('username')}}">
                                                @error('username')
                                                    <div class="invalid-feedback ml-2">{{$message}}</div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user @error('email')
                                                is-invalid
                                            @enderror" id="email" name="email"
                                                placeholder="Alamat Email" value="{{old('email')}}">
                                                @error('email')
                                                    <div class="invalid-feedback ml-2">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user @error('password')
                                                    is-invalid
                                                @enderror"
                                                    id="password" name="password" placeholder="Password">
                                                    @error('password')
                                                        <div class="invalid-feedback ml-2">{{$message}}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user @error('password_confirmation')
                                                    is-invalid
                                                @enderror"
                                                    id="password_confirmation" name="password_confirmation" placeholder="Ulangi Password">
                                                    @error('password_confirmation')
                                                        <div class="invalid-feedback ml-2">{{$message}}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Daftar Sekarang
                                        </button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Lupa Password ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{url('/')}}">Sudah Memiliki Akun ? <strong>Login!</strong>  </a>
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
