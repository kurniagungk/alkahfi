<?php

namespace App\Http\Livewire\Sekolah;

use Livewire\Component;
use App\Sekolah;

class Create extends Component
{

    public $nama;
    public $keterangan;

    public function render()
    {
        return view('livewire.sekolah.create');
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|',
            'keterangan' => 'required|',

        ]);

        $data = array(
            'nama' => $this->nama,
            'keterangan' => $this->keterangan,

        );
        Sekolah::create($data);
        session()->flash('message',   'Data Sekolah berhasil di tambahkan');
        return redirect()->route('sekolah');
    }
}
