<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        $about = About::all();
        return view('user.tentang', compact(['about']));
    }
}