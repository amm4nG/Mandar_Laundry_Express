@extends('layouts.form')
@section('title')
    Masuk
@endsection
@section('form')
    <div class="login-box">
        <div class="login-logo">
            <a href="">Mandar Laundry Express</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Masuk untuk mengakses layanan laundry</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                        name="username" value="{{ old('username') }}" required autofocus placeholder="username">

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="password" type="password"
                        class="form-control mt-3 mb-3 @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password" placeholder="password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1 mt-3">
                    <a href="">Lupa password</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Buat akun</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
