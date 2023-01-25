<?php

namespace App\Http\Controllers;

use App\Models\Cucian;
use Illuminate\Http\Request;

class PengantaranController extends Controller
{
    public function index(){
        $cucian = Cucian::join('paket', 'paket.id', '=', 'cucian.id_paket')->join('layanan', 'layanan.id', '=', 'cucian.id_layanan')->join('users', 'users.id', '=', 'cucian.id_user')->where('status', '=', 'dikirim')->select('cucian.*', 'name', 'username', 'alamat', 'email', 'jenis_paket', 'paket.biaya as biaya_paket', 'jenis_layanan', 'layanan.biaya as biaya_layanan')->get();
        return view('kurir.pengantaran', compact(['cucian']));
    }

    public function update($id){
        $cucian = Cucian::find($id);
        $cucian->status = 'selesai';
        $cucian->update();
        return back();
    }
}