@extends('layouts.main')

@include('partials.navbar')

@section('content')
<section id="antrian" class="d-flex align-items-center">
    <div class="container" style="margin-top: 150px">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <div>
                <div class="container">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="card-title"  style="text-align: center">Jadwal Dokter</div>
                            <div class="row">
                        <div class="col-md-3">
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_id">
                                    <thead>
                                    <tr style="text-align: center">
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama Dokter</th>
                                            <th>Poli</th>
                                            <th>Sesi</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jadwal_dokter as $jadwal)
                                            <tr style="text-align: center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $jadwal->nip }}</td>
                                                <td><strong>{{ $jadwal->nama_dokter }}</strong></td>
                                                <td>{{ ucwords ($jadwal->poli) }}</td>
                                                <td>{{ $jadwal->sesi }}</td>
                                                <td>{{ $jadwal->jam_mulai }}</td>
                                                <td>{{ $jadwal->jam_selesai }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            
                            </div>

                        </div>
                    </div>
                </div>
                @include('livewire.jadwal.deleteJadwal')
</section>

@endsection

@include('partials.footer')