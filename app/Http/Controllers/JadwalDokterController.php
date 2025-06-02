<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $jadwal_dokter = JadwalDokter::all(); 
        return view('dashboard.jadwal.index', compact('jadwal_dokter'));
        return view('dashboard.jadwal.index', ['jadwal_dokter' => $jadwal_dokter]);
    }

        public function create()
    {
        return view('livewire.admin.createjadwal');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:jadwal_dokter,nip',
            'nama_dokter' => 'required|string',
            'poli' => 'required|in:umum,gigi,tht,lansia & disabilitas,balita,kia & kb,nifas/pnc',
            'sesi' => 'required|in:Pagi,Siang,Sore,Malam',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        JadwalDokter::create($validated);

        return redirect()->route('jadwal.create')->with('success', 'Jadwal dokter berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        return view('livewire.admin.edit-jadwal', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalDokter::findOrFail($id);

        $request->validate([
            'nip' => 'required',
            'nama_dokter' => 'required',
            'poli' => 'required',
            'sesi' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal->update([
            'nip' => $request->nip,
            'nama_dokter' => $request->nama_dokter,
            'poli' => $request->poli,
            'sesi' => $request->sesi,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('jadwal.show')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.show')->with('success', 'Jadwal berhasil dihapus.');
    }


}
