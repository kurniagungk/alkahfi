<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class LaporanBulanan implements FromView
{
    private $data;
    private $tanggal;

    public function __construct($data,  $tanggal)
    {
        $this->data = $data;
        $this->tanggal = $tanggal;
    }



    public function view(): View
    {
        return view('excel.laporanbulanan', [
            'data' => $this->data,
            'tanggal' => $this->tanggal
        ]);
    }
}
