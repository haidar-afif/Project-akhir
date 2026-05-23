<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambil Antrean - Barbershop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Barbershop</a>
        <div class="navbar-nav">
            <a class="nav-link active" href="{{ route('pelanggan.ambil') }}">Ambil Antrean</a>
            <!-- Nanti kita buat rute lihat antrean -->
            <a class="nav-link" href="{{ route('pelanggan.lihat') }}">Lihat Antrean</a>
        </div>
    </div>
</nav>

<div class="container d-flex justify-content-center">
    <div class="card shadow-sm w-100" style="max-width: 500px;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Silakan Ambil Antrean</h3>
            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Anda</label>
                    <input type="text" name="nama_pelanggan" class="form-control" required placeholder="Masukkan nama">
                </div>
                <div class="mb-4">
                    <label class="form-label">Pilih Layanan</label>
                    <select name="layanan_id" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Layanan --</option>
                        @foreach($layanans as $layanan)
                            <option value="{{ $layanan->id }}">{{ $layanan->nama_layanan }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100 btn-lg">
                    <i class="bi bi-printer-fill me-2"></i> Cetak Antrean
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>