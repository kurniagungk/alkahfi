<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TunggakanExpor implements FromView
{

    private $data;
    private $tagihan;

    public function __construct($data, $tagihan)
    {

        $this->data = collect($data)->all();
        $this->tagihan = $tagihan;
    }

    public function view(): View
    {
        return view('livewire.tunggakan.export', [
            'data' => $this->data,
            'jenistagihan' => $this->tagihan,
        ]);
    }
}
