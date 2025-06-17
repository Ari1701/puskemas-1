<div class="container mt-4">
    <h2>{{ $berita->judul }}</h2>
    
    @if ($berita->gambar)
        <div class="my-3">
            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" width="400" class="img-fluid rounded">
        </div>
    @endif

    <p>{!! nl2br(e($berita->konten)) !!}</p>

    <a href="{{ route('berita.index') }}" class="btn btn-secondary mt-3">← Kembali</a>
    <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-warning mt-3">Edit</a>
    <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger mt-3">Hapus</button>
    </form>
</div>
@endsection