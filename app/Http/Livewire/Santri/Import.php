<?php

namespace App\Http\Livewire\Santri;

use App\Imports\SantriImport;
use Livewire\{Component, WithFileUploads};

use Maatwebsite\Excel\Facades\Excel;

class Import extends Component
{
    use WithFileUploads;
    public $file;


    public function updatingfile($value)
    {
        $data = Excel::import(new SantriImport, $value);
    }


    public function render()
    {
        return view('livewire.santri.import');
    }
}
