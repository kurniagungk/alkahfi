<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;

class Index extends Component
{

    public $nis;
    public $find = false;
    public $data = false;


    protected $updatesQueryString = [
        'nis',
    ];
    protected $listeners = ['resetFind' => 'resetFind'];

    public function render()
    {
        return view('livewire.transaksi.index');
    }

    public function find()
    {
        $this->find = true;
        $this->emit('reset');
    }

    public function resetFind()
    {
        $this->find = false;
        $this->data = true;
    }
}
