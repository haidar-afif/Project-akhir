<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Layanan</title>
    <!-- Load Bootstrap dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Barbershop Admin</a>
        <div class="navbar-nav">
         
        <a class="nav-link" href="{{ route('admin.index') }}">Lihat Antrean & Scan</a>
        <a class="nav-link active" href="{{ route('admin.layanan') }}">Kelola Layanan</a>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="mb-4">Kelola Layanan Barbershop</h2>

    <!-- Pesan Sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- Form Tambah Layanan -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Tambah Layanan Baru</h5>
                    <form action="{{ route('admin.layanan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Layanan</label>
                            <input type="text" name="nama_layanan" class="form-control" required placeholder="Contoh: Haircut">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga (Opsional)</label>
                            <input type="number" name="harga" class="form-control" placeholder="Contoh: 35000">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan Layanan</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel Daftar Layanan -->
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Daftar Layanan</h5>
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Layanan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($layanans as $index => $layanan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $layanan->nama_layanan }}</td>
                                <td>{{ $layanan->harga ? 'Rp ' . number_format($layanan->harga, 0, ',', '.') : '-' }}</td>
                                <td>
                                    <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>