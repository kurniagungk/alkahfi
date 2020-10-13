<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

use App\Exports\LaporanHarian;
use Maatwebsite\Excel\Facades\Excel;

use App\santri;
use App\Jenis_tagihan;
use App\Tagihan;


class Harian extends Component
{

    public $awal;
    public $akhir;
    private $data;
    private $tagihan;

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

        if (!$user->hasRole('admin'))
            $jenistagihan->Where('sekolah_id', $user->sekolah_id)
                ->orWhere('sekolah_id', null);

        $this->tagihan = $jenistagihan->get();

        $data = [];

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

        Excel::store(new LaporanHarian($data, $tagihan, $tanggal), 'export\laporanharian.xlsx', 'public');
        $this->emit('download');
    }


    public function render()
    {
        $data = $this->data;
        $tagihan = $this->tagihan;
        return view('livewire.laporan.harian', \compact('data', 'tagihan'))
            ->extends('dashboard.base')
            ->section('content');
    }
}
