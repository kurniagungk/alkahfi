<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use App\santri;

class Profil extends Component
{
    public $profil;
    public $IdSantri;

    protected $listeners = ['reset' => 'DataProfil'];

    public function mount($id)
    {
        $this->IdSantri = $id;
        $this->DataProfil();
    }

    public function DataProfil()
    {

        $this->profil = santri::find($this->IdSantri);



        if (is_null($this->profil)) {
            $this->emit('resetFind');
        }
    }


    public function render()
    {
        return view('livewire.transaksi.profil');
    }
}
