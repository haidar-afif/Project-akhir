<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Antrean - Barbershop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Barbershop</a>
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('pelanggan.ambil') }}">Ambil Antrean</a>
            <a class="nav-link active" href="{{ route('pelanggan.lihat') }}">Lihat Antrean</a>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="text-center mb-4">Daftar Antrean Hari Ini</h2>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0 text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No. Antrean</th>
                        <th>Nama Pelanggan</th>
                        <th>Layanan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($antreans as $antrean)
                        <tr class="{{ $antrean->status == 'diproses' ? 'table-warning' : '' }}">
                            <td class="fw-bold">A-{{ str_pad($antrean->nomer_antrean, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $antrean->nama_pelanggan }}</td>
                            <td>{{ $antrean->layanan->nama_layanan }}</td>
                            <td>
                                @if($antrean->status == 'menunggu')
                                    <span class="badge badge-menunggu">Menunggu</span>
                                @elseif($antrean->status == 'diproses')
                                    <span class="badge badge-diproses animate-pulse">Sedang Diproses</span>
                                @else
                                    <span class="badge badge-selesai">Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    <script>
    setTimeout(function() {
        window.location.reload();
    }, 5000);
    </script>
</body>
</html>