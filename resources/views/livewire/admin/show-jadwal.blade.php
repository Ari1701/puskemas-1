@extends('livewire.admin.layouts.main')

@section('content')
<section id="antrian" class="d-flex align-items-center">
    <div class="container mt-5">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="mb-3">
            <a href="/admin/create" class="btn btn-primary">
                <i class="bi bi-plus"></i> Tambah Jadwal
            </a>
        </div>


        {{-- Tabel Jadwal Dokter --}}
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Jadwal Dokter</h5>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="table_id">
                        <thead class="table-success">
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Dokter</th>
                                <th>Poli</th>
                                <th>Sesi</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jadwal_dokter as $jadwal)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jadwal->nip }}</td>
                                    <td><strong>{{ $jadwal->nama_dokter }}</strong></td>
                                    <td>{{ ucwords($jadwal->poli) }}</td>
                                    <td>{{ $jadwal->sesi }}</td>
                                    <td>{{ $jadwal->jam_mulai }}</td>
                                    <td>{{ $jadwal->jam_selesai }}</td>
                                    <td>
                                        <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Tombol Delete -->
                                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Data jadwal tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
