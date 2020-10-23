<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;

use Illuminate\{Support\Facades\DB, Database\Eloquent\Builder, Support\Facades\Auth};
use App\{santri, Jenis_tagihan, Tagihan};
use App\Exports\LaporanHarian;
use Maatwebsite\Excel\Facades\Excel;


class Harian extends Component
{

    public $awal;
    public $akhir;
    private $data;
    private $tagihan;
    public $select = [];

    public function mount()
    {
        $this->awal = date("Y-m-d");
        $this->akhir = date("Y-m-d");
        $this->datat();
    }

    public function datat()
    {

        $user = Auth::user();
        $awal = $this->awal;
        $akhir = $this->akhir;
        $sekolah_id = $user->sekolah_id;

        $datasantri = santri::select('*')->whereHas('bayar', function (Builder $query) use ($awal, $akhir) {
            $query->whereRaw('DATE(bayar.created_at) BETWEEN "' . $awal . '" AND "' . $akhir . '"');
        });
        if (!$user->hasRole('admin'))
            $datasantri->where('sekolah_id', $user->sekolah_id);

        $santri = $datasantri->get();


        $jenistagihan = Jenis_tagihan::with(['tagihan' => function ($query) use ($awal, $akhir, $user) {


            $query->whereHas('santri', function (Builder $query) use ($user) {
                if (!$user->hasRole('admin'))
                    $query->where('sekolah_id', $user->sekolah_id);
            });


            $query->whereHas('bayar', function (Builder $query) use ($awal, $akhir) {
                $query->whereRaw('DATE(bayar.created_at) BETWEEN "' . $awal . '" AND "' . $akhir . '"');
            });
            $query->withCount(['bayar AS bayar' => function ($query) {
                $query->select(DB::raw('SUM(JUMLAH)'));
            }]);
        }]);



        if (!empty($this->select))
            $jenistagihan->whereIn('id', $this->select);

        if (!$user->hasRole('admin')) {
            $jenistagihan->where(function (Builder $query) use ($sekolah_id) {
                $query->Where('sekolah_id', $sekolah_id)
                    ->orWhere('sekolah_id', null);
            });
        }


        $tagihan = $jenistagihan->get();



        $this->tagihan = $tagihan;



        $data = [];
        $i = 1;

        foreach ($santri as $s) {
            $datasantri = [];
            $datasantri['nama'] = $s->nama;
            $datasantri['kelas'] = $s->kelas->kelas;
            $datatagihan = [];





            foreach ($this->tagihan as $j) {



                $tagihan = Tagihan::where('santri_id', $s->id)
                    ->whereHas('bayar', function (Builder $query) use ($awal, $akhir) {
                        $query->whereRaw('DATE(bayar.created_at) BETWEEN "' . $awal . '" AND "' . $akhir . '"');
                    })
                    ->where('jenis_tagihan_id', $j->id)
                    ->withCount(['bayar AS bayar' => function ($query) {
                        $query->select(DB::raw('SUM(JUMLAH)'));
                    }])
                    ->get();


                $datatagihan[] = $tagihan;
            }
            $datasantri['tagihan'] = $datatagihan;
            $data[] = $datasantri;
            $i++;
        }

        $this->data = $data;
    }


    public function export()
    {
        $this->datat();
        $data = $this->data;
        $tagihan = $this->tagihan;
        $tanggal = [
            'awal' => $this->awal,
            'akhir' => $this->akhir
        ];

        return Excel::download(new LaporanHarian($data, $tagihan, $tanggal), 'Laporan Umum ' . $this->awal . ' - ' . $this->akhir . '.xlsx');
    }


    public function render()
    {
        $data = $this->data;
        $tagihan = $this->tagihan;
        $user = Auth::user();

        $jenistagihan = Jenis_tagihan::select('*');

        if (!empty($this->select))
            $jenistagihan->whereIn('id', $this->select);

        if (!$user->hasRole('admin'))
            $jenistagihan->Where('sekolah_id', $user->sekolah_id)
                ->orWhere('sekolah_id', null);

        $datatagihan = $jenistagihan->get();



        return view('livewire.laporan.harian', \compact('data', 'tagihan', 'datatagihan'))
            ->extends('dashboard.base')
            ->section('content');
    }
}
