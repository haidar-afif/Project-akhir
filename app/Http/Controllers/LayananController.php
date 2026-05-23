<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    // Menampilkan halaman kelola layanan
    public function index()
    {
        $layanans = Layanan::all(); // Mengambil semua data layanan dari database
        return view('admin.layanan', compact('layanans'));
    }

    // Menyimpan layanan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'harga' => 'nullable|numeric'
        ]);

        // Simpan ke database
        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'harga' => $request->harga
        ]);

        return redirect()->back()->with('success', 'Layanan berhasil ditambahkan!');
    }

    // Menghapus layanan
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect()->back()->with('success', 'Layanan berhasil dihapus!');
    }
}