@extends('layouts.app')

@section('judul', 'Data Mahasiswa')

@section('konten')
<div class="container my-4">
    <h1 class="h3 mb-4">Data Mahasiswa</h1>

    @if (session('sukses'))
        <div class="alert alert-success mb-3">
            {{ session('sukses') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped bg-white shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Angkatan</th>
                    <th>IPK</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftarMahasiswa as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->programStudi->nama ?? '-' }}</td>
                        <td>{{ $mahasiswa->angkatan }}</td>
                        <td><span class="badge bg-primary">{{ $mahasiswa->ipk }}</span></td>
                        <td>
                            <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Data mahasiswa belum tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pengecekan aman agar tidak error saat fitur Top 10 IPK dipanggil --}}
    @if (method_exists($daftarMahasiswa, 'links'))
        <div class="d-flex justify-content-center mt-3">
            {{ $daftarMahasiswa->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection