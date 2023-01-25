<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class DaftarPaketController extends Controller
{
    public function index(){
        $paket = Paket::all();
        return view('admin.paket', compact(['paket']));
    }
}