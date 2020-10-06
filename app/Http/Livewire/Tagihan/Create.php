<?php

namespace App\Http\Livewire\Tagihan;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Jenis_tagihan;
use App\TahunAjaran;

class Create extends Component
{
    public $nama;
    public $periode;
    public $map;
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
        $user = Auth::user();

        $sekolah = null;

        if (!$user->hasRole('admin'))
            $sekolah = $user->sekolah_id;


        $this->validate([
            'nama' => 'required|',
            'map' => 'required|',
            'periode' => 'required|',
            'tahun' => 'required|',
        ]);

        Jenis_tagihan::create([
            'nama' => $this->nama,
            'map' => $this->map,
            'tipe' => $this->periode,
            'tahun_id' => $this->tahun,
            'sekolah_id' => $sekolah
        ]);

        session()->flash('message', 'taguhan ' . $this->nama . ' berhasil di tambahkan');
        $this->reset('nama');
    }
}
