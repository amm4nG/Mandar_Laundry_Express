@extends('layouts.form')
@section('title')
    Selamat Datang
@endsection
@section('scripts')
    <script>
        setTimeout(() => {
            window.location = 'login'
        }, 500);
    </script>
@endsection
