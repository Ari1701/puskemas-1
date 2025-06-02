@extends('livewire.admin.layouts.main')

@section('content')
<div class="container mt-4">
    <h4>Edit Jadwal Dokter</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ old('nip', $jadwal->nip) }}">
            @error('nip') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="nama_dokter" class="form-label">Nama Dokter</label>
            <input type="text" name="nama_dokter" class="form-control" value="{{ old('nama_dokter', $jadwal->nama_dokter) }}">
            @error('nama_dokter') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="poli" class="form-label">Poli</label>
            <select name="poli" class="form-select">
                <option value="">-- Pilih Poli --</option>
                @foreach(['umum', 'gigi', 'tht', 'lansia & disabilitas', 'balita', 'kia & kb', 'nifas/pnc'] as $poli)
                    <option value="{{ $poli }}" {{ old('poli', $jadwal->poli) == $poli ? 'selected' : '' }}>{{ ucfirst($poli) }}</option>
                @endforeach
            </select>
            @error('poli') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="sesi" class="form-label">Sesi</label>
            <select name="sesi" class="form-select">
                <option value="">-- Pilih Sesi --</option>
                @foreach(['Pagi', 'Siang', 'Sore', 'Malam'] as $sesi)
                    <option value="{{ $sesi }}" {{ old('sesi', $jadwal->sesi) == $sesi ? 'selected' : '' }}>{{ $sesi }}</option>
                @endforeach
            </select>
            @error('sesi') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="jam_mulai" class="form-label">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" value="{{ old('jam_mulai', $jadwal->jam_mulai) }}">
            @error('jam_mulai') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="jam_selesai" class="form-label">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" value="{{ old('jam_selesai', $jadwal->jam_selesai) }}">
            @error('jam_selesai') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Simpan Perubahan
        </button>
        <a href="{{ route('jadwal.show') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
