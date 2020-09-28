<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanHarian implements FromView
{
    private $data;
    private $tagihan;
    private $tanggal;

    public function __construct($data, $tagihan, $tanggal)
    {
        $this->data = $data;
        $this->tagihan = $tagihan;
        $this->tanggal = $tanggal;
    }



    public function view(): View
    {
        return view('excel.laporanharian', [
            'data' => $this->data,
            'tagihan' => $this->tagihan,
            'tanggal' => $this->tanggal
        ]);
    }
}
