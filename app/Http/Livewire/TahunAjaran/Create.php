<?php

namespace App\Http\Livewire\TahunAjaran;

use Livewire\Component;
use App\TahunAjaran;

class Create extends Component
{
    public $nama;
    public $awal;
    public $akhir;

    public function store()
    {
        $this->validate([
            'nama' => 'required|',
            'awal' => 'required|date',
            'akhir' => 'required|date',

        ]);

        $data = array(
            'nama' => $this->nama,
            'awal' => $this->awal,
            'akhir' => $this->akhir

        );

        TahunAjaran::create($data);

        session()->flash('message',   $this->nama . ' berhasil di tambahkan');
        $this->reset();
    }


    public function render()
    {
        return view('livewire.tahun-ajaran.create');
    }
}
