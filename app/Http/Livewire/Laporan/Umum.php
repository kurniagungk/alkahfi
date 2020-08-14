<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

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
        }])->get();

        $this->dataTransaksi = $bayar->get();
    }

    public function render()
    {
        return view('livewire.laporan.umum');
    }
}
