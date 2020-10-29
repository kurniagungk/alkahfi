<?php

namespace App\Http\Livewire\Kelas;

use Livewire\Component;
use App\{santri, Kelas};
use Illuminate\{Database\Eloquent\Builder, Support\Facades\Auth};

class Naik extends Component
{

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $select = [];
    public $all;
    public $naik;
    public $selectKelas;


    public function updatedall($value)
    {
        if ($value) {
            $this->emit('all');
        } else {
            $this->emit('del');
        }
    }

    public function updatedselectKelas()
    {
        $this->reset('select', 'all');
    }

    public function naikKelas()
    {
        $validatedData = $this->validate(
            [
                'select' => 'required',
                'naik' => 'required'
            ],
            [
                'select.required' => 'Silahkan pilih salah satu siswa',
                'naik.required' => 'Silahkan pilih salah satu',
            ],
        );
        santri::whereIn('id', $this->select)->update([
            'kelas_id' => $this->naik
        ]);
        session()->flash('message', 'Berhasil merubah kelas.');
    }


    public function render()
    {

        $user = Auth::user();



        $data =
            santri::select('id', 'nama',  'nisn', 'nism', 'kelas_id', 'jenis_kelamin')->with('kelas');


        if (!$user->hasRole('admin')) {
            $data->where('sekolah_id', $user->sekolah_id);
            $kelas = Kelas::where('sekolah_id', $user->sekolah_id)->get();
        } else {
            $kelas = Kelas::get();
        }

        if ($this->selectKelas > 0) {

            $data->where('kelas_id', $this->selectKelas);
            $santri = $data
                ->where(function (Builder $query) {
                    $query->Where('nama', 'like', '%' . $this->search . '%')
                        ->orWhere('nisn', 'like', '%' . $this->search . '%')
                        ->orWhere('nism', 'like', '%' . $this->search . '%');
                })
                ->latest()
                ->get();
        } else {
            $santri = null;
        }





        return view('livewire.kelas.naik', compact('santri', 'kelas'))
            ->extends('dashboard.base')
            ->section('content');
    }
}
