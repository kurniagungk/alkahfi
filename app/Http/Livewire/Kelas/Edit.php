<?php

namespace App\Http\Livewire\Kelas;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\{Kelas, Sekolah};

class Edit extends Component
{

    public $tingkat;
    public $kelas;
    public $keterangan;
    public $idt;
    public $sekolah;

    public function mount($id)
    {
        $data = Kelas::find($id);
        $this->sekolah_id = $data->sekolah_id;
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
            'sekolah' => 'required|exists:sekolah,id'
        ]);

        $data = array(
            'tingkat' => $this->tingkat,
            'kelas' => $this->kelas,
            'keterangan' => $this->keterangan ?? '',
            'sekolah_id' => $this->sekolah
        );

        Kelas::where('id', $this->idt)->update($data);
        session()->flash('message',  'Data berhasil di edit');
    }

    public function render()
    {

        $user = Auth::user();

        if (!$user->hasRole('admin')) {
            $dataSekolah = Sekolah::where('id', $user->sekolah_id)->get();
        } else {
            $dataSekolah = Sekolah::get();
        }

        return view('livewire.kelas.edit', \compact('dataSekolah'));
    }
}
