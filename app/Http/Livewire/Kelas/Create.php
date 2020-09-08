<?php

namespace App\Http\Livewire\Kelas;

use Livewire\Component;
use App\Kelas;
use App\Sekolah;
use Illuminate\Support\Facades\Auth;


class Create extends Component
{

    public $tingkat;
    public $kelas;
    public $keterangan;
    public $sekolah_id;

    public function render()
    {
        $user = Auth::user();

        if (!$user->hasRole('admin')) {
            $sekolah = Sekolah::where('id', $user->sekolah_id)->get();
        } else {
            $sekolah = Sekolah::get();
        }


        return view('livewire.kelas.create', compact('sekolah'));
    }

    public function store()
    {
        $this->validate([
            'tingkat' => 'required|',
            'kelas' => 'required|',
            'sekolah_id' => 'required'
        ]);

        $data = array(
            'tingkat' => $this->tingkat,
            'kelas' => $this->kelas,
            'keterangan' => $this->keterangan,

        );
        Kelas::create($data);
        session()->flash('message',   $this->kelas . ' berhasil di tambahkan');
        $this->reset();
    }
}
