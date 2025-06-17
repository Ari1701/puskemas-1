@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h2>Daftar Berita</h2>

    <a href="{{ route('berita.create') }}" class="btn btn-success mb-3">Tambah Berita</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Konten</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beritas as $index => $berita)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $berita->judul }}</td>
                    <td>{{ $berita->konten }}</td>
                    <td>
                        @if ($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" width="100">
                        @else
                            Tidak ada
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $beritas->links() }}
</div>
@endsection
