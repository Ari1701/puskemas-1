@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h2>Detail Pesan</h2>

    <div class="mb-3">
        <strong>Nama:</strong> {{ $kontak->name }}
    </div>

    <div class="mb-3">
        <strong>Email:</strong> {{ $kontak->email }}
    </div>

    <div class="mb-3">
        <strong>Pesan:</strong>
        <p>{{ $kontak->message }}</p>
    </div>

    <a href="{{ route('admin.kontak.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
