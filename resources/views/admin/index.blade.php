<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Barbershop Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Barbershop Admin</a>
        <div class="navbar-nav">
            <a class="nav-link active" href="{{ route('admin.index') }}">Lihat Antrean & Scan</a>
            <a class="nav-link" href="{{ route('admin.layanan') }}">Kelola Layanan</a>
        </div>
    </div>
</nav>

<div class="container">
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-primary">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">Scan QR Code Antrean</h5>
                </div>
                <div class="card-body text-center">
                    <p class="text-muted small">Arahkan kursor ke kotak di bawah lalu scan kertas pelanggan.</p>
                    <form action="{{ route('admin.scan') }}" method="POST">
                        @csrf
                        <input type="text" name="qr_code_string" class="form-control form-control-lg text-center mb-3" placeholder="Arahkan Scanner ke Sini" autofocus autocomplete="off" required>
                        <button type="submit" class="btn btn-outline-primary w-100">
                            <i class="bi bi-upc-scan me-2"></i> Proses Scan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-striped mb-0 text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Layanan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($antreans as $antrean)
                                <tr>
                                    <td>
                                        <span class="badge bg-secondary fs-6">A-{{ str_pad($antrean->nomer_antrean, 3, '0', STR_PAD_LEFT) }}</span>
                                    </td>
                                    <td>{{ $antrean->nama_pelanggan }}</td>
                                    <td>{{ $antrean->layanan->nama_layanan }}</td>
                                    <td>
                                        @if($antrean->status == 'menunggu')
                                            <span class="badge bg-warning text-dark">Menunggu</span>
                                        @elseif($antrean->status == 'diproses')
                                            <span class="badge bg-primary">Diproses</span>
                                        @else
                                            <span class="badge bg-success">Selesai</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">Belum ada antrean hari ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>