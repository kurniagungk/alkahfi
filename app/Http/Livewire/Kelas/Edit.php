<?php

namespace App\Http\Livewire\Kelas;

use Livewire\Component;
use App\Kelas;

class Edit extends Component
{

    public $tingkat;
    public $kelas;
    public $ket;
    public $idt;

    public function mount($id)
    {
        $data = Kelas::find($id);
        $this->tingkat = $data->tingkat;
        $this->kelas = $data->kelas;
        $this->ket = $data->ket;
        $this->idt = $id;
    }

    public function update()
    {

        $this->validate([
            'tingkat' => 'required|',
            'kelas' => 'required|',
            'ket' => 'required|',

        ]);

        $data = array(
            'tingkat' => $this->tingkat,
            'kelas' => $this->kelas,
            'ket' => $this->ket,

        );

        Kelas::where('id', $this->idt)->update($data);
        session()->flash('message', 'taguhan ' . $this->kelas . ' berhasil di edit');
    }

    public function render()
    {
        return view('livewire.kelas.edit');
    }
}
