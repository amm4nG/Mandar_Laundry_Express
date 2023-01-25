@extends('layouts.app')
@section('title')
    Daftar Cucian
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
                        <a href="{{ route('daftar-cucian.index') }}" class="nav-link active">
                            <i class="nav-icon fas fa-tshirt"></i>
                            <p>
                                Daftar Cucian
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('daftar-paket.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
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
                    <div class="col-sm-12">
                        <h1><i class="fa fa-tshirt"></i>
                            Daftar Cucian Mandar Laundry Express
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
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Paket</th>
                                            <th>Layanan</th>
                                            <th>Tgl pengambilan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cucian as $c)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $c->name }}</td>
                                                <td>{{ $c->jenis_paket }}</td>
                                                <td>{{ $c->jenis_layanan }}</td>
                                                <td>{{ $c->tanggal_pengambilan }}</td>
                                                <td><span class="badge bg-info">{{ $c->status }}</span></td>
                                                <td>
                                                    @if ($c->status == 'menunggu persetujuan')
                                                        <a href="" class="btn btn-success btn-sm"
                                                            onclick="event.preventDefault(); document.getElementById('form-update').submit();"><i
                                                                class="fa fa-check-circle"></i></a>
                                                        <form id="form-update"
                                                            action="{{ route('daftar-cucian.update', $c->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            <input type="hidden" value="" name="pesan"
                                                                id="pesan">
                                                            @method('put')
                                                        </form>
                                                    @else
                                                        <a class="btn btn-warning btn-sm" href=""
                                                            data-toggle="modal"
                                                            data-target="#kelola-{{ $c->id }}"><i
                                                                class="fa fa-edit"></i></a>
                                                    @endif
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
    <!-- Modal -->
    @foreach ($cucian as $c)
        <div class="modal fade" id="kelola-{{ $c->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kelola Laundry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('daftar-cucian.update', $c->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <label for="">Proses saat ini</label>
                            <ul>
                                <li>
                                    {{ $c->pesan }}
                                </li>
                            </ul>
                            @if ($c->status == 'dikirim')
                            @else
                                <label for="" class="mt-2">Proses selanjutnya</label>
                                <textarea name="pesan" required id="pesan" cols="30" rows="3" class="form-control"></textarea>
                                <div class="form-group form-check mt-3 ml-2">
                                    <input name="status" type="checkbox" class="form-check-input" value="dikirim"
                                        id="exampleCheck1" required>
                                    <label class="form-check-label" for="exampleCheck1">Kirim laundry</label>
                                </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            @if ($c->status == 'dikirim')
                            @else
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
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
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            $('.swalDefaultSuccess').click(function() {
                Toast.fire({
                    icon: 'success',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
        });
    </script>
@endsection
