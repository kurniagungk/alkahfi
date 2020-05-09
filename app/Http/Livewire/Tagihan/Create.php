<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\Component;
use App\DaftarTagihan;

class Create extends Component
{
    public $nama;
    public $periode;
    public $tahun;



    public function render()
    {
        return view('livewire.tagihan.create');
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|min:6',
            'periode' => 'required|',
            'tahun' => 'required|',
        ]);

        // Execution doesn't reach here if validation fails.

        DaftarTagihan::create([
            'nama' => $this->nama,
            'id_jenis' => $this->periode,
            'id_tahun' => $this->tahun,

        ]);
        session()->flash('message', 'taguhan ' . $this->nama . ' berhasil di tambahkan');
        $this->reset();
    }
}
