<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrean extends Model
{
    use HasFactory;

    // Mengizinkan kolom-kolom ini diisi data
    protected $fillable = [
        'nomer_antrean', 
        'nama_pelanggan', 
        'layanan_id', 
        'qr_code_string', 
        'status'
    ];

    // Relasi: Satu antrean hanya memilih satu layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}