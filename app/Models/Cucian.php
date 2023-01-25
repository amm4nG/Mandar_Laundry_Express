<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cucian extends Model
{
    use HasFactory;
    protected $table = 'cucian';
    protected $fillable = [
        'no_hp',
        'alamat', 
        'id_user',
        'id_paket',
        'id_layanan',
        'status',
        'pesan',
    ];
}