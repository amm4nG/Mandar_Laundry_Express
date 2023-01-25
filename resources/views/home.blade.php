@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="">
                    <i class="fas fa-user mr-1"></i> {{ Auth::user()->username }} <i class="fas fa-caret-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item text-danger"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index3.html" class="brand-link text-center">
            <span class="brand-text font-weight-light">Mandar Laundry Express</span>
        </a>
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->username }}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a class="nav-link active">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">MENU UTAMA</li>
                    @if (Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a href="{{ route('daftar-cucian.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tshirt"></i>
                                <p>
                                    Daftar Cucian
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('daftar-paket.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Daftar Paket
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('daftar-layanan.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-filter"></i>
                                <p>
                                    Daftar Layanan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('daftar-pengguna.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Daftar Pengguna
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pengaturan.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Pengaturan
                                </p>
                            </a>
                        </li>
                    @elseif(Auth::user()->role == 'kurir')
                        <li class="nav-item">
                            <a href="{{ route('pengambilan.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-truck text-orange"></i>
                                <p>
                                    Pengambilan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pengantaran.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-truck text-warning"></i>
                                <p>
                                    Pengantaran
                                </p>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('laundry.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tshirt"></i>
                                <p>
                                    Layanan Laundry
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('riwayat-laundry.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-history"></i>
                                <p>
                                    Riwayat Laundry
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tentang-kami.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-question-circle"></i>
                                <p>
                                    Tentang Kami
                                </p>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                            class="nav-link text-danger">
                            <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Keluar
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        @if (Auth::user()->role == 'admin')
                            <h1><i class="fa fa-home"></i>
                                Halaman admin Mandar Laundry Express
                            </h1>
                        @elseif(Auth::user()->role == 'kurir')
                            <h1><i class="fa fa-home"></i>
                                Halaman Kurir Mandar Laundry Express
                            </h1>
                        @else
                            <h1 class="text-capitalize">
                                <i class="fa fa-home"></i> selamat datang diwebsite mandar laundry Express
                            </h1>
                            <p class="mt-2 text-justify">

                            </p>
                        @endif
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @if (Auth::user()->role == 'admin')
        @elseif(Auth::user()->role == 'kurir')
        @else
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <center>
                                <img src="{{ asset('dist/img/icon_monitoring.png') }}" class="img-fluid" alt="">
                            </center>
                            <h5 class="text-center mt-2">Pantau Proses Cucian secara Realtime</h5>
                            <p class="text-center">
                                Sebagai wujud transparansi terhadap layanan yang kami berikan, anda dapat memantau proses
                                cucian mulai dari pencucian hingga tahap finishing.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <center>
                                <img src="{{ asset('dist/img/icon-sabun.png') }}" class="img-fluid" alt="">
                            </center>
                            <h5 class="text-center mt-2">Penggunaan Detergen pilihan</h5>
                            <p class="text-center">
                                Dilengkapi dengan berbagai macam chemical pembersih atau detergen sesuai jenis noda dan
                                jenis bahan pakaian anda. Dukungan staff yang terlatih untuk menangani setiap permasalahan
                                pada pakaian anda.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <center>
                                <img src="{{ asset('dist/img/icon-checkmark.png') }}" class="img-fluid" alt="">
                            </center>
                            <h5 class="text-center mt-2">Jaminan Kehilangan</h5>
                            <p class="text-center">
                                Penetapan prosedur yang selalu mengalami penyempurnaan untuk peningkatan mutu layanan
                                laundry. Apabila terjadi kehilangan akan kami garansi sesuai syarat dan ketentuan berlaku.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection
