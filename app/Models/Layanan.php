<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    // Mengizinkan kolom ini diisi data
    protected $fillable = ['nama_layanan', 'harga'];

    // Relasi: Satu jenis layanan bisa dipilih oleh banyak antrean
    public function antreans()
    {
        return $this->hasMany(Antrean::class);
    }
}