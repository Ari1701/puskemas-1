@extends('layouts.main')

@include('partials.navbar')

@section('content')
<div class="container mt-4">
    
    @if ($berita->gambar)
    <div class="mb-4">
        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
    </div>
    @endif

    <h1 class="fw-bold mb-3">{{ $berita->judul }}</h1>
    
    <div class="mb-4">
        <p class="text-muted">Diposting pada: {{ $berita->created_at->format('d M Y - H:i') }}</p>
        <div style="white-space: pre-line;">
            {!! nl2br(e($berita->konten)) !!}
        </div>
    </div>

    <a href="{{ route('dashboard.home') }}" class="btn btn-outline-secondary mb-5">← Kembali ke Daftar Berita</a>
</div>
@endsection