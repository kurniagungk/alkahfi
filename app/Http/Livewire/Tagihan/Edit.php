<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\Component;
use App\{TahunAjaran, Jenis_tagihan};

class Edit extends Component
{
    public $nama;
    public $map;
    public $periode;
    public $tahun;
    public $idt;
    public $TahunAjaran;


    public function mount($id)
    {
        $data = Jenis_tagihan::find($id);
        $this->nama = $data->nama;
        $this->map = $data->map;
        $this->periode = $data->tipe;
        $this->tahun = $data->tahun_id;
        $this->idt = $id;
        $this->TahunAjaran = TahunAjaran::latest()->get();
    }

    public function update()
    {

        $this->validate([
            'nama' => 'required|',
            'map' => 'required|',
            'periode' => 'required|in:1,2',
            'tahun' => 'required|exists:tahun_ajaran,id',
        ]);

        $data = array(
            'nama' => $this->nama,
            'map' => $this->nama,
            'tipe' => $this->periode,
            'tahun_id' => $this->tahun,
        );


        Jenis_tagihan::where('id', $this->idt)->update($data);
        session()->flash('message', 'taguhan ' . $this->nama . ' berhasil di edit');
    }

    public function render()
    {
        return view('livewire.tagihan.edit');
    }
}
