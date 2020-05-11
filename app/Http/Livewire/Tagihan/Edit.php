<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\Component;
use App\DaftarTagihan;
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
        $data = DaftarTagihan::find($id);
        $this->nama = $data->nama;
        $this->periode = $data->id_jenis;
        $this->tahun = $data->id_tahun;
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
            'id_jenis' => $this->periode,
            'id_tahun' => $this->tahun,
        );

        DaftarTagihan::where('id_tagihan', $this->idt)->update($data);
        session()->flash('message', 'taguhan ' . $this->nama . ' berhasil di edit');
    }

    public function render()
    {
        return view('livewire.tagihan.edit');
    }
}
