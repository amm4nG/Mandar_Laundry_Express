<?php

namespace App\Http\Controllers;

use App\Models\Cucian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class PengambilanController extends Controller
{
    public function index(){
        $cucian = Cucian::join('paket', 'paket.id', '=', 'cucian.id_paket')->join('layanan', 'layanan.id', '=', 'cucian.id_layanan')->join('users', 'users.id', '=', 'cucian.id_user')->where('status', '=', 'disetujui')->where('bobot', '=', null)->select('cucian.*', 'name', 'username', 'alamat', 'email', 'jenis_paket', 'paket.biaya as biaya_paket', 'jenis_layanan', 'layanan.biaya as biaya_layanan')->get();
        return view('kurir.pengambilan', compact(['cucian']));
    }

    public function update(Request $request, $id){
        $request->validate([
            'bobot' => ['required'],
            'pesan' => ['required']
        ]);
        $cucian = Cucian::find($id);
        $cucian->bobot = $request->bobot;
        $cucian->pesan = $request->pesan;
        $cucian->update();
        return back();
    }
}