@extends('layouts.form')
@section('title')
    Buat akun
@endsection
@section('form')
    <div class="register-box">
        <div class="register-logo">
            <a href="">Mandar Laundry Express</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Buat akun laundry Anda</p>

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <input id="name" type="text" class="form-control mt-3 @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="nama">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="username" type="text" class="form-control mt-3 @error('username') is-invalid @enderror"
                        name="username" value="{{ old('username') }}" required autocomplete="username"
                        placeholder="username">

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="email" type="email" class="form-control mt-3 @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="password" type="password" class="form-control mt-3 @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="password-confirm" type="password" class="form-control mt-3" name="password_confirmation"
                        required autocomplete="new-password" placeholder="konfirmasi password">

                    <div class="row">
                        <div class="col-6 mb-3 mt-3">
                            <button type="submit" class="btn btn-primary btn-block">Buat akun</button>
                        </div>
                    </div>
                </form>

                <a href="{{ route('login') }}" class="text-center">Saya sudah punya akun</a>
            </div>
        </div>
    </div>
@endsection
