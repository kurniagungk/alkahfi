<?php

namespace App\Http\Livewire\Kelas;

use Livewire\Component;
use App\Kelas;

class Edit extends Component
{

    public $tingkat;
    public $kelas;
    public $keterangan;
    public $idt;

    public function mount($id)
    {
        $data = Kelas::find($id);
        $this->tingkat = $data->tingkat;
        $this->kelas = $data->kelas;
        $this->keterangan = $data->keterangan;
        $this->idt = $id;
    }

    public function update()
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

        Kelas::where('id', $this->idt)->update($data);
        session()->flash('message',  'Data berhasil di edit');
    }

    public function render()
    {
        return view('livewire.kelas.edit');
    }
}
