@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h2>Edit Berita</h2>

<form action="{{ url('admin/berita/' . $berita->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="judul">Judul</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul', $berita->judul) }}">
    </div>

    <div class="mb-3">
        <label for="konten">Konten</label>
        <textarea name="konten" class="form-control">{{ old('konten', $berita->konten) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="gambar">Gambar</label>
        <input type="file" name="gambar" class="form-control">
        @if ($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" width="120" class="mt-2">
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>


</div>
@endsection
