<?php

namespace App\Http\Controllers;

use App\Models\Cucian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatLaundryUserController extends Controller
{
    public function index()
    {
        $cucian = Cucian::join('paket', 'paket.id', '=', 'cucian.id_paket')->join('layanan', 'layanan.id', '=', 'cucian.id_layanan')->where('cucian.id_user', Auth::user()->id)->where('status', '!=', 'selesai')->select('cucian.*', 'jenis_paket', 'paket.biaya as biaya_paket', 'jenis_layanan', 'layanan.biaya as biaya_layanan')->first();
        $riwayat = Cucian::join('paket', 'paket.id', '=', 'cucian.id_paket')->join('layanan', 'layanan.id', '=', 'cucian.id_layanan')->where('cucian.id_user', Auth::user()->id)->where('status', '=', 'selesai')->select('cucian.*', 'jenis_paket', 'paket.biaya as biaya_paket', 'jenis_layanan', 'layanan.biaya as biaya_layanan')->get();
        return view('user.riwayat', compact(['cucian', 'riwayat']));
    }
}