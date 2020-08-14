<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Storage;

use App\Sekolah;
use App\Jenis_tagihan;
use App\Bayar;


class Umum extends Component
{

    public $awal;
    public $akhir;
    public $periode;
    public $jenis;
    public $sekolah;

    public $dataSekolah;
    public $dataJenis;
    public $dataTransaksi;


    public function mount()
    {
        $this->dataSekolah = Sekolah::get();
        $this->dataJenis = Jenis_tagihan::get();
    }

    public function updatingjenis($value)
    {

        if ($value == 0) $this->dataJenis = Jenis_tagihan::get();
        if ($value == 1) $this->dataJenis = Jenis_tagihan::where("tipe", "spp")->get();
        if ($value == 2) $this->dataJenis = Jenis_tagihan::where("tipe", "cicilan")->get();
    }

    public function data()
    {

        $this->validate([
            'awal' => 'required|',
            'akhir' => 'required|',
            'periode' => 'required|',
        ]);

        if ($this->periode)
            $this->validate([
                'jenis' => 'required|',
            ]);

        $date = $this->awal;
        // End date
        $end_date = $this->akhir;


        $bayar = Bayar::whereRaw('Date(created_at) BETWEEN "' . date($date) . '" AND "' . date($end_date) . '"');


        if ($this->jenis)
            $bayar->whereHas('jenis_tagihan', function (Builder $query) {
                $query->where('jenis_tagihan.id', $this->jenis);
            });

        if ($this->sekolah)
            $bayar->whereHas('santri', function (Builder $query) {
                $query->where('santri.sekolah_id', $this->sekolah);
            });

        $bayar->with('jenis_tagihan');

        $bayar->with(['santri' => function ($query) {
            $query->join('sekolah', 'santri.sekolah_id', '=', 'sekolah.id');
            $query->select("santri.nis", "santri.nama", "sekolah.nama as nama_sekolah");
        }]);

        $this->dataTransaksi = $bayar->get();
    }

    public function export()
    {


        $this->validate([
            'awal' => 'required|',
            'akhir' => 'required|',
            'periode' => 'required|',
        ]);

        if ($this->periode)
            $this->validate([
                'jenis' => 'required|',
            ]);


        $date = $this->awal;
        // End date
        $end_date = $this->akhir;

        $data = array();

        while (strtotime($date) <= strtotime($end_date)) {




            $bayar = Bayar::whereRaw('Date(created_at) = "' . date($date) . '"');



            if ($this->jenis)
                $bayar->whereHas('jenis_tagihan', function (Builder $query) {
                    $query->where('jenis_tagihan.id', $this->jenis);
                });



            if ($this->sekolah)
                $bayar->whereHas('santri', function (Builder $query) {
                    $query->where('santri.sekolah_id', $this->sekolah);
                });



            $bayar->with('jenis_tagihan');



            $bayar->with(['santri' => function ($query) {
                $query->join('sekolah', 'santri.sekolah_id', '=', 'sekolah.id');
                $query->select("santri.nis", "santri.nama", "sekolah.nama as nama_sekolah");
            }]);


            $data[$date] = $bayar->get();
            $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
        }



        $pdf = PDF::loadview('laporan.umumpdf', compact('data'));
        $pdf->setPaper('A4', 'landscape');
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'enable_remote' => false]);
        Storage::disk('public')->put('pdf/laporan-umum.pdf', $pdf->output());
        $this->emit('download');
    }

    public function render()
    {
        return view('livewire.laporan.umum');
    }
}
