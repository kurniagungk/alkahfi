<?php

namespace App\Http\Livewire\Sekolah;

use Livewire\Component;
use App\Sekolah;

class Edit extends Component
{
    public $nama;
    public $keterangan;
    public $sekolah_id;

    public function mount(Sekolah $sekolah)
    {
        $this->nama = $sekolah->nama;
        $this->keterangan = $sekolah->keterangan;
        $this->sekolah_id = $sekolah->id;
    }

    public function render()
    {
        return view('livewire.sekolah.edit');
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|',
            'keterangan' => 'required|',

        ]);

        $data = array(
            'nama' => $this->nama,
            'keterangan' => $this->keterangan,

        );
        Sekolah::where('id', $this->sekolah_id)
            ->update($data);
        session()->flash('message',   'Data Sekolah berhasil di edit');
        return redirect()->route('sekolah');
    }
}
