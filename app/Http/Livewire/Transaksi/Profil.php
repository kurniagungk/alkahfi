<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;

class Profil extends Component
{
    public $profil;
    public $santri_id;

    protected $listeners = ['reset' => 'DataProfil'];

    public function mount($profil)
    {
        $this->profil = $profil;
    }

    public function DataProfil()
    {
    }


    public function render()
    {
        return view('livewire.transaksi.profil');
    }
}
