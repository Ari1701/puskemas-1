<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Antrian;

class ShowAntrian extends Component
{
    public function render()
    {
        return view('livewire.antrian.show-antrian', [
            'antrian' => $this->poli ? Antrian::where('poli', $this->poli)->where('is_call', 0)->paginate(10) : Antrian::where('is_call', 0)->paginate(10),
        ]);
    }

}
