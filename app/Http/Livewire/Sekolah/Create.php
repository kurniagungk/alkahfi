<?php

namespace App\Http\Livewire\Sekolah;

use Livewire\WithFileUploads;

use Livewire\Component;
use App\Sekolah;
use phpDocumentor\Reflection\Types\This;

class Create extends Component
{
    use WithFileUploads;
    public $nama;
    public $alamat;
    public $keterangan;
    public $logo;

    public function render()
    {
        return view('livewire.sekolah.create');
    }

    public function store()
    {



        $this->validate([
            'nama' => 'required|',
            'keterangan' => 'required|',
            'alamat' => 'required|',
            'logo' => 'image|max:2048',
        ]);

        $logo = $this->logo->store('logo', 'public');

        $data = array(
            'nama' => $this->nama,
            'keterangan' => $this->keterangan,
            'alamat' => $this->alamat,
            'logo' => $logo,
        );

        Sekolah::create($data);
        session()->flash('message',   'Data Sekolah berhasil di tambahkan');
        return redirect()->route('sekolah');
    }
}
