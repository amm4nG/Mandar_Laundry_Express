<?php

namespace App\Http\Controllers;

use App\Models\Cucian;
use Illuminate\Http\Request;

class DaftarCucianController extends Controller
{
    public function index(){
        $cucian = Cucian::join('users', 'users.id', '=', 'cucian.id_user')->join('paket', 'paket.id', '=', 'cucian.id_paket')->join('layanan', 'layanan.id', '=', 'cucian.id_layanan')->where('status', '!=', 'selesai')->select('cucian.*', 'name', 'username', 'email', 'paket.biaya as biaya_paket', 'jenis_paket', 'layanan.biaya as biaya_layanan', 'jenis_layanan')->get();
        return view('admin.cucian', compact(['cucian']));
    }

    public function update(Request $request, $id){
        $cucian = Cucian::find($id);
        if($request->status == null || $request->status == ''){
            $cucian->status = 'disetujui';
        }else{
            $cucian->status = $request->status;
        }
        if($request->pesan == '' || $request->pesan == null){
            $cucian->pesan = 'Laundry akan dijemput sesuai tanggal pengambilan.';
        }else{
            $cucian->pesan = $request->pesan;
        }
        $cucian->update();
        return back();
    }
}