<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\Component;
use App\DaftarTagihan;

class Index extends Component
{
    public $DaftarTagihan;
    public function render()
    {
        $this->DaftarTagihan = DaftarTagihan::get();
        return view('livewire.tagihan.index');
    }
}
