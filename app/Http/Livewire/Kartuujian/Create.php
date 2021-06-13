<?php

namespace App\Http\Livewire\Kartuujian;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.kartuujian.create')->extends('dashboard.base')
            ->section('content');
    }
}
