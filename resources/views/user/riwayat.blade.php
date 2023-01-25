@extends('layouts.app')
@section('title')
    Riwayat Laundry
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
                        <a href="{{ route('riwayat-laundry.index') }}" class="nav-link active">
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
        </div>
    </aside>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    @if (optional($cucian)->count() > 0)
                        <div class="col-sm-12 mb-3">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h1 class="mb-3">Laundry saat ini...</h1>
                                    @if ($cucian->pesan == null)
                                    @else
                                        <li class="mb-3 text-bold font-italic text-justify text-info">

                                            {{ $cucian->pesan }}
                                        </li>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6 mb-3 text-info">
                                            <i class="fa fa-info-circle">
                                                Status : {{ $cucian->status }}
                                                <ul class="font-italic">
                                                    <li class="mt-3">Kode : MLE{{ $cucian->id }}</li>
                                                    <li class="mt-2">Jenis paket : {{ $cucian->jenis_paket }}</li>
                                                    <li class="mt-2">Jenis layanan : {{ $cucian->jenis_layanan }}</li>
                                                    <li class="mt-2">Tanggal pengambilan :
                                                        {{ $cucian->tanggal_pengambilan }}</li>
                                                    <li class="mt-2">Bobot : <span class="text-secondary">
                                                            @if ($cucian->bobot == null)
                                                                belum
                                                                ditentukan
                                                            @else
                                                                {{ $cucian->bobot }} kg
                                                            @endif
                                                        </span></li>
                                                    <li class="mt-2">No.Telp : {{ $cucian->no_hp }}</li>
                                                    <li class="mt-2">Alamat : {{ $cucian->alamat }}</li>
                                                    <li class="mt-2">
                                                        Total pembayaran :
                                                        <span class="text-secondary">Rp.
                                                            @if ($cucian->bobot == null)
                                                                -
                                                            @else
                                                                {{ number_format($cucian->bobot * $cucian->biaya_paket + $cucian->bobot * $cucian->biaya_layanan) }}
                                                            @endif
                                                        </span>
                                                    </li>
                                                </ul>
                                            </i>
                                        </div>
                                        <div class="col-md-6">
                                            <i class="fa fa-info-circle text-info text-justify">
                                                Catatan
                                                <ul>
                                                    <li class="mt-3 font-italic">Jika status laundry disetujui, Kami
                                                        akan menjemput
                                                        laundry sesuai
                                                        tanggal pengambilan yang telah Anda atur</li>
                                                    <li class="mt-3 font-italic">
                                                        Laundry akan langsung ditimbang dan dilakukan penginputan bobot saat
                                                        jasa layanan
                                                        antar jemput kami
                                                        melakukan pengambilan
                                                    </li>
                                                    <li class="mt-3 font-italic">
                                                        Pembayaran dilakukan setelah laundry dikembalikan.
                                                    </li>
                                                </ul>
                                            </i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- riwayat laundry --}}
                    <div class="col-sm-8">
                        <h1 class=""><i class="fas fa-history"></i> Riwayat Laundry</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-sm table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal pemesanan</th>
                                            <th>Jenis paket</th>
                                            <th>Jenis layanan</th>
                                            <th>Bobot(kg)</th>
                                            <th>Total pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($riwayat as $cucian)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $cucian->tanggal_pengambilan }}</td>
                                                <td>{{ $cucian->jenis_paket }}</td>
                                                <td>{{ $cucian->jenis_layanan }}</td>
                                                <td>{{ $cucian->bobot }}</td>
                                                <td>Rp.
                                                    {{ number_format($cucian->bobot * $cucian->biaya_paket + $cucian->bobot * $cucian->biaya_layanan) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
