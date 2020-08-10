<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use App\santri;

class Profil extends Component
{
    public $profil;
    public $santri_id;

    protected $listeners = ['reset' => 'DataProfil'];

    public function mount($id)
    {
        $this->santri_id = $id;
        $this->DataProfil();
    }

    public function DataProfil()
    {

        $profil = santri::firstWhere('nis', $this->santri_id);

        if (is_null($profil)) {
            $this->emit('resetFind');
        } else {
            $this->emit('profil');
            $this->profil = $profil;
        }
    }


    public function render()
    {
        return view('livewire.transaksi.profil');
    }
}
