<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use App\Bayar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class Harian extends Component
{

    public $select;
    public $jenis;
    public $tanggal = array();
    public $data;


    public function click()
    {
        $date = $this->tanggal['awal'];
        // End date
        $end_date = $this->tanggal['ahir'];

        $data = array();

        while (strtotime($date) <= strtotime($end_date)) {




            $bayar = Bayar::whereRaw('Date(created_at) = "' . date($date) . '"')
                ->with('jenis_tagihan')
                ->with('santri')
                ->get();




            $data[$date] = $bayar;
            $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
        }


        $pdf = PDF::loadview('laporan.harianpdf', compact('data'));
        $pdf->setPaper('A4', 'landscape');
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'enable_remote' => false]);
        Storage::disk('public')->put('pdf/laporan-harian.pdf', $pdf->output());
        $this->emit('download');
    }

    public function updatedselect()
    {
        $this->jenis = null;
    }

    public function render()
    {
        return view('livewire.laporan.harian');
    }
}
