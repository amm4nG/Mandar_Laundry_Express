@extends('layouts.app')
@section('title')
    Layanan Laundry
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
                        <a href="{{ route('laundry.index') }}" class="nav-link active">
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
                        <h1>
                            <i class="nav-icon fas fa-tshirt"></i> Layanan Laundry
                        </h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @if (optional($cucian)->count() > 0)
                        <div class="col-md-12 mt-2 mb-3">
                            <h5 class="text-justify alert alert-default"> <i class="fa fa-info-circle mr-1"></i> Pantau
                                laundry Anda pada halaman <a href="{{ route('riwayat-laundry.index') }}"
                                    class="text-bold text-primary">Riwayat
                                    laundry</a>
                            </h5>
                        </div>
                    @else
                        <div style="display: none" id="pantau-laundry" class="col-md-12 mt-2 mb-3">
                            <h5 class="text-justify alert alert-default">
                                <i class="fa fa-info-circle mr-1"></i> Pantau laundry Anda pada halaman <a
                                    href="{{ route('riwayat-laundry.index') }}" class="text-bold text-primary">Riwayat
                                    laundry</a>
                            </h5>
                        </div>
                    @endif
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Cara Kerja Laundry Kami</h3>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <center>
                                            <img src="{{ asset('dist/img/icon_schedule.png') }}" class="img-fluid"
                                                alt="">
                                        </center>
                                        <h5 class="text-center mt-3">Atur jadwal pengambilan</h5>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <center>
                                            <img src="{{ asset('dist/img/icon_mesin_cuci.png') }}" class="img-fluid"
                                                alt="">
                                        </center>
                                        <h5 class="text-center mt-3">Kami proses pakaian Anda</h5>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <center>
                                            <img src="{{ asset('dist/img/icon_delivery2.png') }}" class="img-fluid"
                                                alt="">
                                        </center>
                                        <h5 class="text-center mt-3">Pengantaran pakaian</h5>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <h5>
                                            <i class="fa fa-info-circle"></i> Informasi Tentang Pilihan Paket
                                        </h5>
                                        <ul>
                                            @foreach ($paket as $p)
                                                <li class="text-capitalize">paket {{ $p->jenis_paket }} selesai
                                                    {{ $p->info_selesai }}
                                                    hari (biaya tambahan Rp. {{ number_format($p->biaya) }}/kg)
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <div class="form-group">
                                            <label>Pilih paket</label>
                                            <select class="custom-select text-capitalize" id="id-paket" name="id-paket">
                                                @foreach ($paket as $p)
                                                    <option class="text-capitalize" value="{{ $p->id }}">paket
                                                        {{ $p->jenis_paket }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label>Jenis layanan</label>
                                            <select class="custom-select text-capitalize" id="id-layanan"
                                                name="id-layanan">
                                                @foreach ($layanan as $y)
                                                    <option value="{{ $y->id }}">{{ $y->jenis_layanan }} (Rp.
                                                        {{ number_format($y->biaya) }}/kg)</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mt-3">
                                        <div class="form-group">
                                            <label>Tanggal pengambilan</label>
                                            <input value="" type="date" name="tanggal_pengambilan"
                                                id="tanggal_pengambilan" class="form-control">
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="tanggal_pengambilan_invalid"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="">Nomor Handphone</label>
                                        <input type="number" value="" class="form-control"
                                            placeholder="08XXXXXXXXXX" name="no_hp" id="no_hp">
                                        {{-- kembalikan pesan error --}}
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="no_hp_invalid"></strong>
                                        </span>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="">Alamat lengkap</label>
                                        <textarea name="alamat" placeholder="" class="form-control" id="alamat" cols="30" rows="5"></textarea>
                                        {{-- kembalikan pesan error --}}
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="alamat_invalid"></strong>
                                        </span>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        @if (optional($cucian)->count() > 0)
                                            <button disabled style="width: 6rem" id="kirim"
                                                class="btn btn-info mt-1 mr-1 swalDefaultSuccess">
                                                Kirim
                                            </button>
                                        @else
                                            <button style="width: 6rem" id="kirim"
                                                class="btn btn-info mt-1 swalDefaultSuccess">
                                                Kirim
                                                <div class="spinner-border spinner-border-sm text-white" id="loading"
                                                    role="status" style="display: none">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </button>
                                        @endif
                                    </div>


                                </div>
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
        $('#kirim').on('click', function(e) {
            e.preventDefault()
            //buat buttonnya jadi disable
            $("#kirim").attr("disabled", true);
            //tampilkan animasi loadingnya 
            $('#loading').show()
            //ambil data inputan
            var noHp = $('#no_hp').val()
            var alamat = $('#alamat').val()
            var idPaket = $('#id-paket').val()
            var idLayanan = $('#id-layanan').val()
            var tanggalPengambilan = $('#tanggal_pengambilan').val()
            //csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('laundry.store') }}",
                type: 'post',
                data: {
                    no_hp: noHp,
                    alamat: alamat,
                    idPaket: idPaket,
                    idLayanan: idLayanan,
                    tanggal_pengambilan: tanggalPengambilan
                },
                success: function(response) {
                    //switch alert
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        icon: 'success',
                        title: 'Terimakasih, data laundry Anda berhasil terkirim.'
                    })
                    $('#btn_cek').show()
                    //hapus semua class is-invalid
                    $('.is-invalid').removeClass('is-invalid')
                    //hilangkan animasi loadingnya
                    $('#loading').hide()
                    //buat buttonnya jadi berfungsi lagi
                    $("#kirim").attr("disabled", true)
                    $('#menunggu-persetujuan').show()
                    $('#pantau-laundry').show()
                },
                error: function(response) {
                    if (response.status == 422) {
                        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            icon: 'error',
                            title: 'Terjadi kesalahan, pastikan anda memasukkan data dengan benar.'
                        })
                        //hapus semua class is-invalid
                        $('.is-invalid').removeClass('is-invalid')
                        //ambil error yang dikemabalikan
                        for (var key in response.responseJSON.errors) {
                            //tambahkan class is-invalid dari id yang memiliki error
                            $('#' + key).addClass('is-invalid')
                            //tampilkan pesan error yang diterima
                            $('#' + key + "_invalid").html(response.responseJSON.errors[key])
                        }
                        //setelah selesai merequest ke server
                        //hilangkan animasi loadingnya
                        $('#loading').hide()
                        //buat buttonnya jadi berfungsi lagi
                        $("#kirim").attr("disabled", false);
                        console.log(response);
                    }

                }
            })
        })
    </script>
@endsection
