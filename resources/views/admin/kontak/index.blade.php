@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h2>Pesan Masuk</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Dikirim Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kontaks as $kontak)
                <tr>
                    <td>{{ $kontak->name }}</td>
                    <td>{{ $kontak->email }}</td>
                    <td>{{ $kontak->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.kontak.show', $kontak->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $kontaks->links() }}
</div>
@endsection