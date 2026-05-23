<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Antrean</title>
    <style>
        /* Styling khusus printer thermal (58mm width approx 200px) */
        body {
            font-family: 'Courier New', Courier, monospace; /* Font struk */
            width: 250px; 
            margin: 0 auto;
            text-align: center;
            padding: 10px;
        }
        h2, h3, p { margin: 5px 0; }
        .nomer { font-size: 40px; font-weight: bold; margin: 10px 0; }
        .qr-box { margin: 15px 0; }
        .garis { border-bottom: 2px dashed #000; margin: 10px 0; }
        
        /* Hilangkan tombol saat dicetak ke kertas */
        @media print {
            .btn-print { display: none; }
        }
    </style>
</head>
<!-- auto print saat halaman terbuka -->
<body onload="window.print()"> 

    <h2>BARBERSHOP</h2>
    <p>Tanggal: {{ \Carbon\Carbon::parse($antrean->created_at)->format('d-m-Y H:i') }}</p>
    
    <div class="garis"></div>
    
    <p>No. Antrean</p>
    <div class="nomer">A-{{ str_pad($antrean->nomer_antrean, 3, '0', STR_PAD_LEFT) }}</div>
    
    <div class="garis"></div>
    
    <p><strong>Nama:</strong> {{ $antrean->nama_pelanggan }}</p>
    <p><strong>Layanan:</strong> {{ $antrean->layanan->nama_layanan }}</p>
    
    <div class="qr-box">
        <!-- Render QR Code di sini -->
        {!! QrCode::size(120)->generate($antrean->qr_code_string) !!}
    </div>
    
    <p style="font-size: 12px;">Harap serahkan QR Code ini<br>kepada Kasir / Admin</p>
    
    <button class="btn-print" onclick="window.print()" style="margin-top: 20px; padding: 10px; cursor: pointer;">Print Ulang</button>
    <br><br>
    <a href="{{ route('pelanggan.ambil') }}" class="btn-print" style="text-decoration: none; color: blue;">Kembali ke Halaman Utama</a>

</body>
</html>