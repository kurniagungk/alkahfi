<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\Component;
use App\Jenis_tagihan;
use App\TahunAjaran;

class Edit extends Component
{
    public $nama;
    public $periode;
    public $tahun;
    public $idt;
    public $TahunAjaran;


    public function mount($id)
    {
        $data = Jenis_tagihan::find($id);
        $this->nama = $data->nama;
        $this->periode = $data->tipe;
        $this->tahun = $data->tahun_id;
        $this->idt = $id;
        $this->TahunAjaran = TahunAjaran::latest()->get();
    }

    public function update()
    {

        $this->validate([
            'nama' => 'required|min:6',
            'periode' => 'required|',
            'tahun' => 'required|',
        ]);

        $data = array(
            'nama' => $this->nama,
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
