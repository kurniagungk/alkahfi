<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;

class Index extends Component
{

    public $nis;
    public $find = false;


    public function render()
    {
        return view('livewire.transaksi.index');
    }

    public function find()
    {
        $this->find = true;
    }
}
