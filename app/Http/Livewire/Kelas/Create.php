<?php

namespace App\Http\Livewire\Kelas;

use Livewire\Component;
use App\{Kelas, Sekolah};
use Illuminate\Support\Facades\Auth;


class Create extends Component
{

    public $tingkat;
    public $kelas;
    public $keterangan;
    public $sekolah;

    public function render()
    {
        $user = Auth::user();

        if (!$user->hasRole('admin')) {
            $dataSekolah = Sekolah::where('id', $user->sekolah_id)->get();
        } else {
            $dataSekolah = Sekolah::get();
        }


        return view('livewire.kelas.create', compact('dataSekolah'));
    }

    public function store()
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
        Kelas::create($data);
        session()->flash('message',   $this->kelas . ' berhasil di tambahkan');
        $this->reset();
    }
}
