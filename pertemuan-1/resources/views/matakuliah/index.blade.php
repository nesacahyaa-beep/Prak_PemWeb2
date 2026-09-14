@extends('layouts.app')
@section('judul', 'Daftar Matakuliah')
@section('konten')
<h1 class="h3 mb-4">Daftar Matakuliah</h1>

<form action="/data-matakuliah" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Cari kode atau nama matakuliah..." value="{{ $katakunci }}">
        <button class="btn btn-primary" type="submit">Cari</button>
    </div>
</form>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($daftarMatakuliah as $mk)
        <tr>
            <td>{{ $mk['kode'] }}</td>
            <td>{{ $mk['nama'] }}</td>
            <td><x-badge-sks :sks="$mk['sks']" /></td>
            <td>Semester {{ $mk['semester'] }}</td>
            <td>
                <a href="{{ route('matakuliah.show', $mk['kode']) }}" class="btn btn-sm btn-info text-white">Detail</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Matakuliah tidak ditemukan.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection