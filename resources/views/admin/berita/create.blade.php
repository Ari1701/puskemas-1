@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h2>Tambah Berita</h2>

    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="konten">Konten</label>
            <textarea id="konten" name="konten" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="gambar">Gambar</label>
            <input type="file" id="gambar" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
