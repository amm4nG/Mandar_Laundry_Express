@extends('layouts.app')
@section('title')
    Tentang Kami
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
                    <a class="d-block">{{ Auth::user()->username }}</a>
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
                    <!-- Add icons to the links using the .nav-icon class
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">MENU UTAMA</li>
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
                        <a href="{{ route('tentang-kami.index') }}" class="nav-link active">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>
                                Tentang Kami
                            </p>
                        </a>
                    </li>
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
                    <div class="col-sm-8">
                        <h1><i class="fas fa-question-circle"></i> Tentang Kami</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="callout callout-info">
                            <h5 class="text-justify p-2">
                                Kami hadir di tengah kesibukan anda, kami hadir untuk membantu anda mencuci pakaian.
                                Dilengkapi
                                dengan dukungan prosedur dan staff terbaik untuk membantu mensolusikan pakaian anda.
                            </h5>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="alert alert-success alert-dismissible fade show" id="info-success" style="display: none"
                            role="alert">
                            Terima kasih, komentar Anda telah terkirim.
                            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-warning alert-dismissible fade show" id="info-warning"
                            style="display: none" role="alert">
                            Harap isi kolom komentar!
                            <button type="button" class="close text-primary" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Hubungi Kami</h3>
                                <div class="card-tools">
                                    <button class="btn btn-tool" data-card-widget="collapse" type="button"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputDescription">Kirim pesan</label>
                                    <textarea required class="form-control" name="komentar" id="komentar" rows="4"></textarea>
                                </div>
                                <button id="kirim" class="btn btn-info btn-lg btn-flat">
                                    <i class="icon fas fa-send"></i> Kirim <div id="loading"
                                        class="spinner-border spinner-border-sm ml-1 text-white" style="display: none"
                                        role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </button>
                                <a class="btn btn-success btn-lg btn-flat" href=""><i
                                        class="icon fab fa-whatsapp"></i>
                                    WhatsApp</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
