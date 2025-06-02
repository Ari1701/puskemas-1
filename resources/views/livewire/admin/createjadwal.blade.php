@extends('livewire.admin.layouts.main')

@section('content')
<div class="container">
    <h1>Tambah Jadwal Dokter</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" name="nip" id="nip" class="form-control" value="{{ old('nip') }}">
            @error('nip') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="nama_dokter" class="form-label">Nama Dokter</label>
            <input type="text" name="nama_dokter" id="nama_dokter" class="form-control" value="{{ old('nama_dokter') }}">
            @error('nama_dokter') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="poli" class="form-label">Poli</label>
            <select name="poli" id="poli" class="form-select">
                <option value="">-- Pilih Poli --</option>
                <option value="umum" {{ old('poli') == 'umum' ? 'selected' : '' }}>Umum</option>
                <option value="gigi" {{ old('poli') == 'gigi' ? 'selected' : '' }}>Gigi</option>
                <option value="tht" {{ old('poli') == 'tht' ? 'selected' : '' }}>THT</option>
                <option value="lansia & disabilitas" {{ old('poli') == 'lansia & disabilitas' ? 'selected' : '' }}>Lansia & Disabilitas</option>
                <option value="balita" {{ old('poli') == 'balita' ? 'selected' : '' }}>Balita</option>
                <option value="kia & kb" {{ old('poli') == 'kia & kb' ? 'selected' : '' }}>KIA & KB</option>
                <option value="nifas/pnc" {{ old('poli') == 'nifas/pnc' ? 'selected' : '' }}>Nifas/PNC</option>
            </select>
            @error('poli') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="sesi" class="form-label">Sesi</label>
            <select name="sesi" id="sesi" class="form-select">
                <option value="">-- Pilih Sesi --</option>
                <option value="Pagi" {{ old('sesi') == 'Pagi' ? 'selected' : '' }}>Pagi</option>
                <option value="Siang" {{ old('sesi') == 'Siang' ? 'selected' : '' }}>Siang</option>
                <option value="Sore" {{ old('sesi') == 'Sore' ? 'selected' : '' }}>Sore</option>
                <option value="Malam" {{ old('sesi') == 'Malam' ? 'selected' : '' }}>Malam</option>
            </select>
            @error('sesi') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="jam_mulai" class="form-label">Jam Mulai</label>
            <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" value="{{ old('jam_mulai') }}">
            @error('jam_mulai') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="jam_selesai" class="form-label">Jam Selesai</label>
            <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" value="{{ old('jam_selesai') }}">
            @error('jam_selesai') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
