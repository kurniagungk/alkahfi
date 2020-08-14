<?php

namespace App\Http\Livewire\TahunAjaran;

use Livewire\Component;
use App\TahunAjaran;

class Edit extends Component
{

    public $nama;
    public $awal;
    public $akhir;
    public $semester;
    public $idt;


    public function render()
    {
        return view('livewire.tahun-ajaran.edit');
    }

    public function mount($id)
    {
        $data = TahunAjaran::find($id);
        $this->semester = $data->semester;
        $this->nama = $data->nama;
        $this->awal = $data->awal;
        $this->akhir = $data->akhir;
        $this->idt = $id;
    }

    public function update()
    {

        $this->validate([
            'nama' => 'required|',
            'semester' => 'required|',
            'awal' => 'required|date',
            'akhir' => 'required|date',

        ]);

        $data = array(
            'nama' => $this->nama,
            'semester' => $this->semester,
            'awal' => $this->awal,
            'akhir' => $this->akhir
        );

        TahunAjaran::where('id', $this->idt)->update($data);
        session()->flash('message', 'taguhan ' . $this->nama . ' berhasil di edit');
    }
}
