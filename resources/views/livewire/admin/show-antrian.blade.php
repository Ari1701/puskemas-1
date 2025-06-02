@extends('livewire.admin.layouts.main')

@section('content')
<div class="container mt-4">
    <h4>Data Antrian Hari Ini</h4>

    @if ($cekAntrian > 0)
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped">
                <thead class="table-success text-center">
                    <tr>
                        <th>No</th>
                        <th>No Antrian</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>No HP</th>
                        <th>No KTP</th>
                        <th>Tgl Lahir</th>
                        <th>Pekerjaan</th>
                        <th>Keluhan</th>
                        <th>Poli</th>
                        <th>Dipanggil?</th>
                        <th>Tanggal Antrian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($antrians as $key => $antrian)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $antrian->no_antrian }}</td>
                            <td>{{ $antrian->nama }}</td>
                            <td>{{ $antrian->alamat }}</td>
                            <td>{{ $antrian->jenis_kelamin }}</td>
                            <td>{{ $antrian->no_hp }}</td>
                            <td>{{ $antrian->no_ktp }}</td>
                            <td>{{ \Carbon\Carbon::parse($antrian->tgl_lahir)->format('d-m-Y') }}</td>
                            <td>{{ $antrian->pekerjaan }}</td>
                            <td>{{ $antrian->keluhan }}</td>
                            <td>{{ ucfirst($antrian->poli) }}</td>
                            <td>
                                @if ($antrian->is_call)
                                    <span class="badge bg-success">Ya</span>
                                @else
                                    <span class="badge bg-secondary">Belum</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($antrian->tanggal_antrian)->format('d-m-Y') }}</td>
                            <td>
                                @if (!$antrian->is_call)
                                    <form action="{{ route('antrian.call', $antrian->id) }}" method="POST" onsubmit="return confirm('Panggil pasien ini?')">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-primary">
                                            <i class="bi bi-bell-fill"></i> Panggil
                                        </button>
                                    </form>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info mt-3">
            Belum ada antrian hari ini.
        </div>
    @endif
</div>
@endsection
