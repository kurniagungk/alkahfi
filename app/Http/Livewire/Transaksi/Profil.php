<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use App\santri;

class Profil extends Component
{
    public $profil;

    public function mount($id)
    {
        $this->profil = santri::where('id_santri', $id)
            ->get();
    }


    public function render()
    {
        return view('livewire.transaksi.profil');
    }
}
