<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    
    public function index()
    {
        $antreans = Antrean::with('layanan')
                    ->whereDate('created_at', Carbon::today())
                    ->orderBy('nomer_antrean', 'desc') // Yang terbaru di atas
                    ->get();
                    
        return view('admin.index', compact('antreans'));
    }

    public function scan(Request $request)
    {
        $request->validate([
            'qr_code_string' => 'required|string'
        ]);

        
        $antrean = Antrean::where('qr_code_string', $request->qr_code_string)->first();

        if (!$antrean) {
            return redirect()->back()->with('error', 'QR Code tidak ditemukan atau tidak valid!');
        }

        // Logika perubahan status
        if ($antrean->status == 'menunggu') {
            $antrean->update(['status' => 'diproses']);
            return redirect()->back()->with('success', 'Antrean A-' . str_pad($antrean->nomer_antrean, 3, '0', STR_PAD_LEFT) . ' sedang DIPROSES.');
        } 
        elseif ($antrean->status == 'diproses') {
            $antrean->update(['status' => 'selesai']);
            return redirect()->back()->with('success', 'Antrean A-' . str_pad($antrean->nomer_antrean, 3, '0', STR_PAD_LEFT) . ' telah SELESAI.');
        } 
        else {
            return redirect()->back()->with('error', 'Antrean ini sudah berstatus SELESAI sebelumnya.');
        }
    }
}