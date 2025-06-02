<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\JadwalDokter;
use Livewire\WithPagination;

class ShowJadwal extends Component
{
    public $jadwals; // Data jadwal dokter
    public $nip, $nama_dokter, $poli, $sesi, $jam_mulai, $jam_selesai; 
    public $updateMode = false;
    public $search;
    public $poli_filter; 
    protected $queryString = ['search']; 

    public function render()
    {
                $jadwal_dokter = JadwalDokter::query()
        ->when($this->poli_filter, function($query) {
            $query->where('poli', $this->poli_filter);
        })
        ->when($this->search, function($query) {
            $query->where('nama_dokter', 'like', '%' . $this->search . '%')
                  ->orWhere('nip', 'like', '%' . $this->search . '%')
                  ->orWhere('poli', 'like', '%' . $this->search . '%');
        })
        ->paginate(10);


        $poli_list = JadwalDokter::groupBy('poli')->pluck('poli');

        return view('livewire.admin.show-jadwal', [
            'jadwal_dokter' => $jadwal_dokter,
            'poli_list' => $poli_list
        ]);
    }
}
