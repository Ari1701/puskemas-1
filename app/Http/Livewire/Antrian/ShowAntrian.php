<?php

namespace App\Http\Livewire\Antrian;

use App\Models\Antrian;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;



class ShowAntrian extends Component
{
    public $antrian_id, $no_antrian, $nama, $alamat, $jenis_kelamin, $no_hp, $no_ktp, $tgl_lahir, $pekerjaan, $keluhan, $poli, $tanggal_antrian, $user_id, $data;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'keluhan'         => 'required',
        'poli'              => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }


    public function save()
    {
        $this->validate([
            'keluhan' => 'required',
            'poli' => 'required',
        ]);

        $user = auth()->user();

        // Ambil antrian terakhir hari ini berdasarkan poli
        $latestAntrian = Antrian::where('poli', $this->poli)
            ->where('tanggal_antrian', now()->toDateString())
            ->latest('id')
            ->first();

        if (!$latestAntrian) {
            // Set awalan kode berdasarkan jenis poli
            $kode = match ($this->poli) {
                'umum' => 'U',
                'gigi' => 'G',
                'tht' => 'T',
                'lansia & disabilitas' => 'L',
                'balita' => 'B',
                'kia & kb' => 'K',
                'nifas/pnc' => 'N',
                default => 'X',
            };
            $this->no_antrian = $kode . '1';
        } else {
            $kode = substr($latestAntrian->no_antrian, 0, 1);
            $angka = (int) substr($latestAntrian->no_antrian, 1) + 1;
            $this->no_antrian = $kode . $angka;
        }

        $this->tanggal_antrian = now()->toDateString();

        Antrian::create([
            'user_id'          => $user->id,
            'no_antrian'       => $this->no_antrian,
            'tanggal_antrian'  => $this->tanggal_antrian,
            'nama'             => $user->name,
            'alamat'           => $user->alamat,
            'jenis_kelamin'    => $user->jenis_kelamin,
            'no_hp'            => $user->no_hp,
            'no_ktp'           => $user->no_ktp,
            'tgl_lahir'        => $user->tgl_lahir,
            'pekerjaan'        => $user->pekerjaan,
            'keluhan'          => $this->keluhan,
            'poli'             => $this->poli,
        ]);

        session()->flash('success', 'Berhasil Mengambil Antrian');
        $this->emit('update');
        $this->reset(['keluhan', 'poli', 'no_antrian', 'tanggal_antrian']);
        $this->dispatchBrowserEvent('closeModal');
    }



    public function resetInput()
    {
        $this->poli = '';
        $this->keluhan = '';
    }

    public function close_modal()
    {
        $this->resetInput();
    }

    public function editAntrian($antrian_id)
    {
        $antrian = Antrian::find($antrian_id);
        if ($antrian) {
            $this->antrian_id       = $antrian->id;
            $this->no_antrian       = $antrian->no_antrian;
            $this->nama             = $antrian->nama;
            $this->alamat           = $antrian->alamat;
            $this->jenis_kelamin    = $antrian->jenis_kelamin;
            $this->no_hp            = $antrian->no_hp;
            $this->no_ktp           = $antrian->no_ktp;
            $this->poli             = $antrian->poli;
            $this->tgl_lahir        = $antrian->tgl_lahir;
            $this->pekerjaan        = $antrian->pekerjaan;
            $this->keluhan        = $antrian->keluhan;
        } else {
            return redirect()->to('/');
        }
    }

    public function updateAntrian()
    {

        if ($this->poli === 'umum') {
            $this->no_antrian = 'U1';
        } elseif ($this->poli === 'gigi') {
            $this->no_antrian = 'G1';
        } elseif ($this->poli === 'tht') {
            $this->no_antrian = 'T1';
        } elseif ($this->poli === 'lansia & disabilitas') {
            $this->no_antrian = 'L1';
        } elseif ($this->poli === 'balita') {
            $this->no_antrian = 'B1';
        } elseif ($this->poli === 'kia & kb') {
            $this->no_antrian = 'K1';
        } elseif ($this->poli === 'nifas/pnc') {
            $this->no_antrian = 'N1';
        }


        $latest_no_antrian = Antrian::where('poli', $this->poli)
            ->latest()
            ->first();

        if ($latest_no_antrian) {
            $kode_awal = substr($latest_no_antrian->no_antrian, 0, 1);
            $angka = (int) substr($latest_no_antrian->no_antrian, 1);
            $angka += 1;
            $this->no_antrian = $kode_awal . $angka;
        }

        $validatedData = $this->validate([
            'no_antrian'    => 'required|unique:antrians',
            'nama'          => 'required',
            'alamat'        => 'required',
            'jenis_kelamin' => 'required',
            'no_hp'         => 'required',
            'no_ktp'        => 'required',
            'poli'          => 'required',
            'tgl_lahir'     => 'required',
            'pekerjaan'     => 'required',
            'keluhan'     => 'required',
        ]);

        Antrian::where('id', $this->antrian_id)->update([
            'no_antrian'    => $validatedData['no_antrian'],
            'nama'          => $validatedData['nama'],
            'alamat'        => $validatedData['alamat'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'no_hp'         => $validatedData['no_hp'],
            'no_ktp'        => $validatedData['no_ktp'],
            'poli'          => $validatedData['poli'],
            'tgl_lahir'     => $validatedData['tgl_lahir'],
            'pekerjaan'     => $validatedData['pekerjaan'],
            'keluhan'     => $validatedData['keluhan'],
        ]);

        session()->flash('success', 'Berhasil Mengedit Data Antrian Anda');
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function deleteAntrian($antrian_id)
    {
        $this->antrian_id = $antrian_id;
    }

    public function destroy()
    {
        Antrian::find($this->antrian_id)->delete();
        session()->flash('success', 'Berhasil Menghapus 1 Data');
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function showDetail($antrian_id)
    {
        $antrian = Antrian::find($antrian_id);
        if ($antrian) {
            $this->antrian_id       = $antrian->id;
            $this->no_antrian       = $antrian->no_antrian;
            $this->nama             = $antrian->nama;
            $this->alamat           = $antrian->alamat;
            $this->jenis_kelamin    = $antrian->jenis_kelamin;
            $this->no_hp            = $antrian->no_hp;
            $this->no_ktp           = $antrian->no_ktp;
            $this->poli             = $antrian->poli;
            $this->tgl_lahir        = $antrian->tgl_lahir;
            $this->pekerjaan        = $antrian->pekerjaan;
            $this->keluhan        = $antrian->keluhan;
        } else {
            return redirect()->to('/');
        }
    }

    public function mount()
    {
        $this->data = Antrian::all();
    }

    public function render()
    {
        return view('livewire.antrian.show-antrian', [
            'antrian' => $this->poli ? Antrian::where('poli', $this->poli)->where('is_call', 0)->paginate(10) : Antrian::where('is_call', 0)->paginate(10),
            'cekAntrian' => Antrian::where('user_id', Auth::id())->count(),
            'detailAntrian' => Antrian::where('user_id', Auth::id())->where('is_call', 0)->get()
        ]);
    }
}
