<?php

namespace App\Http\Livewire\Kelas;

use Livewire\Component;
use App\Kelas;

class Create extends Component
{

    public $tingkat;
    public $kelas;
    public $keterangan;

    public function render()
    {
        return view('livewire.kelas.create');
    }

    public function store()
    {
        $this->validate([
            'tingkat' => 'required|',
            'kelas' => 'required|',
            'keterangan' => 'required|',

        ]);

        $data = array(
            'tingkat' => $this->tingkat,
            'kelas' => $this->kelas,
            'keterangan' => $this->keterangan,

        );
        Kelas::create($data);
        session()->flash('message',   $this->kelas . ' berhasil di tambahkan');
        $this->reset();
    }
}
