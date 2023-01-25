<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class DaftarLayananController extends Controller
{
    public function index(){
        $layanan = Layanan::all();
        return view('admin.layanan', compact(['layanan']));
    }
}