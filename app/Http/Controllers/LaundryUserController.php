<?php

namespace App\Http\Controllers;

use App\Models\Cucian;
use App\Models\Layanan;
use App\Models\Paket; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaundryUserController extends Controller
{ 
    public function index()
    {
        $paket = Paket::all();  
        $layanan = Layanan::all();
        $cucian = Cucian::join('paket', 'paket.id', '=', 'cucian.id_paket')->join('layanan', 'layanan.id', '=', 'cucian.id_layanan')->where('cucian.id_user', Auth::user()->id)->where('status', '!=', 'selesai')->select('cucian.*', 'jenis_paket', 'paket.biaya as biaya_paket', 'jenis_layanan', 'layanan.biaya as biaya_layanan')->first();
        return view('user.laundry', compact(['paket', 'layanan', 'cucian']));
    }

    public function store(Request $request){
        $request->validate([
            'no_hp' => ['required'],
            'alamat' => ['required'], 
            'tanggal_pengambilan' => ['required', 'date', 'after_or_equal:today']
        ],[
            'no_hp.required' => 'Nomor handphone tidak boleh kosong', 
            'alamat.required' => 'Alamat tidak boleh kosong',
            'tanggal_pengambilan.required' => 'Harap atur tanggal pengambilan',
            'tanggal_pengambilan.after_or_equal' => 'Tanggal pengambilan harus hari ini atau setelahnya' 
        ]); 
        $cucian = new Cucian();
        $cucian->no_hp = $request->no_hp;
        $cucian->alamat = $request->alamat;
        $cucian->tanggal_pengambilan = $request->tanggal_pengambilan;
        $cucian->id_user = Auth::user()->id;
        $cucian->id_paket = $request->idPaket;
        $cucian->id_layanan = $request->idLayanan;
        $cucian->status = 'menunggu persetujuan'; 
        $cucian->save();
        return response()->json($request);
    }
}