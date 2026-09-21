<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container">
        <a href="{{ route('mahasiswa.data') }}" class="btn btn-secondary mb-3">&laquo; Kembali</a>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Profil Mahasiswa</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
                        <p><strong>Nama:</strong> {{ $mahasiswa->nama }}</p>
                        <p><strong>Email:</strong> {{ $mahasiswa->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Program Studi:</strong> {{ $mahasiswa->programStudi->nama }}</p>
                        <p><strong>Angkatan:</strong> {{ $mahasiswa->angkatan }}</p>
                        <p><strong>IPK:</strong> <span class="badge bg-primary">{{ $mahasiswa->ipk }}</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Matakuliah yang Diambil</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Matakuliah</th>
                            <th>SKS</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mahasiswa->matakuliah as $mk)
                            <tr>
                                <td>{{ $mk->kode }}</td>
                                <td>{{ $mk->nama }}</td>
                                <td>{{ $mk->sks }} SKS</td>
                                <td>
                                    <span class="badge bg-success">{{ $mk->pivot->nilai }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada matakuliah yang diambil.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>