<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AntreanController extends Controller
{
    // Halaman Form Ambil Antrean (Pelanggan)
    public function create()
    {
        // Ambil semua layanan untuk ditampilkan di pilihan Dropdown
        $layanans = Layanan::all(); 
        return view('pelanggan.ambil', compact('layanans'));
    }

    // Proses menyimpan antrean
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'layanan_id' => 'required|exists:layanans,id'
        ]);

        // Hitung nomor antrean hari ini
        $jumlahAntreanHariIni = Antrean::whereDate('created_at', Carbon::today())->count();
        $nomerAntreanBaru = $jumlahAntreanHariIni + 1;

        // Generate string unik untuk QR (Contoh: BBR-20260523-001)
        $qrString = 'BBR-' . date('Ymd') . '-' . str_pad($nomerAntreanBaru, 3, '0', STR_PAD_LEFT);

        // Simpan ke database
        $antrean = Antrean::create([
            'nomer_antrean' => $nomerAntreanBaru,
            'nama_pelanggan' => $request->nama_pelanggan,
            'layanan_id' => $request->layanan_id,
            'qr_code_string' => $qrString,
            'status' => 'menunggu'
        ]);

        // Arahkan otomatis ke halaman cetak thermal
        return redirect()->route('pelanggan.cetak', $antrean->id);
    }

    // Halaman khusus untuk print thermal
    public function cetak($id)
    {
        $antrean = Antrean::with('layanan')->findOrFail($id);
        return view('pelanggan.cetak', compact('antrean'));
    }

    // Menampilkan daftar antrean hari ini untuk pelanggan
    public function lihat()
    {
        // Hanya ambil data antrean hari ini, urutkan dari nomor terkecil
        $antreans = Antrean::with('layanan')
                    ->whereDate('created_at', \Carbon\Carbon::today())
                    ->orderBy('nomer_antrean', 'asc')
                    ->get();
                    
        return view('pelanggan.lihat', compact('antreans'));
    }
}