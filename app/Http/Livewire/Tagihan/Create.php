<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\Component;
use App\DaftarTagihan;
use App\TahunAjaran;

class Create extends Component
{
    public $nama;
    public $periode;
    public $tahun;
    public $TahunAjaran;

    public function mount()
    {
        $this->TahunAjaran = TahunAjaran::latest()->get();
        $this->tahun = $this->TahunAjaran['0']->id_tahun;
    }


    public function render()
    {
        return view('livewire.tagihan.create',);
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
        $this->reset('nama');
    }
}
