<?php

namespace App\Http\Livewire\Kelas;

use Livewire\Component;

class Naik extends Component
{
    public function render()
    {
        return view('livewire.kelas.naik')
            ->extends('dashboard.base')
            ->section('content');
    }
}
