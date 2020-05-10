<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\Component;
use App\DaftarTagihan;

class Tambah extends Component
{

    public $periode;
    public $dataJenis = [];
    public $jenis;


    public function render()
    {
        return view('livewire.tagihan.tambah');
    }
    public function updatedperiode($value)
    {
        $this->dataJenis = DaftarTagihan::where('id_jenis', $value)
            ->get();
    }

    public function asd()
    {
        dd($this->dataJenis);
    }
}
