@extends('layouts.app')
@section('title')
    Daftar Paket
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
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">MENU UTAMA</li>
                    <li class="nav-item">
                        <a href="{{ route('daftar-cucian.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tshirt"></i>
                            <p>
                                Daftar Cucian
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('daftar-paket.index') }}" class="nav-link active">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Daftar Paket
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('daftar-layanan.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-filter"></i>
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
                        <h1><i class="fa fa-box"></i>
                            Daftar Paket Mandar Laundry Express
                        </h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-sm table-bordered table-striped text-capitalize">
                                    <a href="" class="btn btn-info btn-sm">Tambah Paket</a>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Paket</th>
                                            <th>Biaya(kg)</th>
                                            <th>Selesai</th>
                                            <th>Diskon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paket as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $p->jenis_paket }}</td>
                                                <td>Rp. {{ number_format($p->biaya) }}</td>
                                                <td>{{ $p->info_selesai }} Hari</td>
                                                <td>{{ $p->diskon }}%</td>
                                                <td>
                                                    <a href="" data-toggle="modal"
                                                        data-target="#edit-{{ $p->id }}"
                                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i></a>
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
    {{-- @foreach ($paket as $p)
        <div class="modal fade" id="edit-{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Paket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            @csrf
                            @method('put')
                            <label for="">Nama paket</label>
                            <input type="text" value="{{ $p->jenis_paket }}" class="form-control mb-2"
                                name="jenis_paket" id="jenis_paket">
                            <label for="">Biaya</label>
                            <input type="text" value="{{ $p->biaya }}" class="form-control mb-2" name="biaya"
                                id="jenis_paket">
                            <label for="">Lama pengerjaan</label>
                            <input type="text" value="{{ $p->info_selesai }} Hari" class="form-control mb-2"
                                name="info_selesai" id="jenis_paket">
                            <label for="">Diskon(%)</label>
                            <input type="text" value="{{ $p->diskon }}" class="form-control" name="biaya"
                                id="jenis_paket">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach --}}
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
