<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\Component;
use App\Jenis_tagihan;
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

        Jenis_tagihan::create([
            'nama' => $this->nama,
            'tipe' => $this->periode,
            'tahun_id' => $this->tahun,
        ]);

        session()->flash('message', 'taguhan ' . $this->nama . ' berhasil di tambahkan');
        $this->reset('nama');
    }
}
