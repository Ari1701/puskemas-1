<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        // Menghitung jumlah pengguna
        $userCount = User::count();
    
        // Mengirim jumlah pengguna ke view admin.index
        return view('admin.index', ['userCount' => $userCount]);
    }

    public function daftarpengguna()
    {
        // Mengambil semua data pengguna
        $users = User::paginate(10); 
        $cekAntrian = Antrian::where('user_id', auth()->id())->first();

        // Mengirim data pengguna ke view
        return view('livewire.admin.show-user', compact('users'));
    }

    public function edit(User $user)
    {
        return view('livewire.admin.editUser', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi data yang dikirim
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role_id' => 'required|integer',
        ]);

        // Update data pengguna
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('livewire.admin.daftarpengguna')->with('success', 'Pengguna berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }

    public function showJadwal(Request $request)
    {
        $poli_filter = $request->input('poli_filter');
        $search = $request->input('search');

        $jadwal_dokter = JadwalDokter::query()
            ->when($poli_filter, function ($query) use ($poli_filter) {
                $query->where('poli', $poli_filter);
            })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('nama_dokter', 'like', '%' . $search . '%')
                            ->orWhere('nip', 'like', '%' . $search . '%')
                            ->orWhere('poli', 'like', '%' . $search . '%');
                });
            })
            ->paginate(10);

        $poli_list = JadwalDokter::select('poli')->distinct()->pluck('poli');

        return view('livewire.admin.show-jadwal', [
            'jadwal_dokter' => $jadwal_dokter,
            'poli_list' => $poli_list,
            'search' => $search,
            'poli_filter' => $poli_filter
        ]);
    }

    public function antrian()
    {
        $antrians = Antrian::all();
        $cekAntrian = $antrians->count();

        return view('livewire.admin.show-antrian', compact('antrians', 'cekAntrian'));
    }

    public function call($id)
    {
        $antrian = Antrian::findOrFail($id);

        $antrian->update(['is_call' => true]);

        return redirect()->back()->with('success', 'Pasien berhasil dipanggil.');
    }

}

