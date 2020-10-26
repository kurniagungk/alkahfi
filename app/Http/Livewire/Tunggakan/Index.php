<?php

namespace App\Http\Livewire\Tunggakan;


use Livewire\Component;
use Illuminate\{Support\Facades\DB, Database\Eloquent\Builder, Support\Facades\Auth};
use App\Exports\TunggakanExpor;
use Maatwebsite\Excel\Facades\Excel;
use App\{Jenis_tagihan, santri, Tagihan};

class Index extends Component
{

    public $awal;
    public $akhir;
    public $data;
    public $jenistagihan;
    public $select = [];


    public function datat()
    {
        $this->reset('data');
        $user = Auth::user();
        $awal = $this->awal;
        $akhir = $this->akhir;
        $sekolah_id = $user->sekolah_id;

        $datasantri = santri::select('*');
        if (!$user->hasRole('admin'))
            $datasantri->where('sekolah_id', $user->sekolah_id);

        $santri = $datasantri->get();


        $jenistagihan = Jenis_tagihan::with(['tagihan' => function ($query) use ($awal, $akhir, $user) {
            $query->whereHas('santri', function (Builder $query) use ($user) {
                if (!$user->hasRole('admin'))
                    $query->where('sekolah_id', $user->sekolah_id);
            });
            $query->where('status', 'belum');
            $query->where('tempo', '<', date('Y-m-d'));
        }])
            ->orderBy('tipe', 'asc');





        if (!empty($this->select))
            $jenistagihan->whereIn('id', $this->select);

        if (!$user->hasRole('admin')) {
            $jenistagihan->where(function (Builder $query) use ($sekolah_id) {
                $query->Where('sekolah_id', $sekolah_id)
                    ->orWhere('sekolah_id', null);
            });
        }


        $datatagihan = $jenistagihan->get();


        $this->jenistagihan = $datatagihan;



        $data = [];
        $i = 1;



        foreach ($santri as $s) {
            $datasantri = [];
            $datasantri['nama'] = $s->nama;
            $datasantri['kelas'] = $s->kelas->kelas;
            $datatagihan = [];





            foreach ($this->jenistagihan as $j) {



                $tagihan = Tagihan::where('santri_id', $s->id)
                    ->where('status', 'belum')
                    ->select(DB::raw('SUM(jumlah) as jumlah'))
                    ->where('jenis_tagihan_id', $j->id)
                    ->where('tempo', '<', date('Y-m-d'))
                    ->withCount(['bayar AS bayar' => function ($query) {
                        $query->select(DB::raw('SUM(JUMLAH)'));
                    }])->first();

                $datatagihan[] = $tagihan->toArray();
            }
            $datasantri['tagihan'] = $datatagihan;
            $data[] = $datasantri;

            $i++;
        }

        $this->data = collect($data);
    }


    public function export()
    {
        if (empty($this->data))
            $this->datat();

        $data = $this->data;
        $tagihan = $this->jenistagihan;

        return Excel::download(new TunggakanExpor($data, $tagihan), 'Laporan Umum ' . date("d-m-Y")  . '.xlsx');
    }

    public function updatingselect($value)
    {
        $this->reset('data');
    }



    public function render()
    {

        $user = Auth::user();

        $jenistagihan = Jenis_tagihan::select('*');

        if (!empty($this->select))
            $jenistagihan->whereIn('id', $this->select);

        if (!$user->hasRole('admin'))
            $jenistagihan->Where('sekolah_id', $user->sekolah_id)
                ->orWhere('sekolah_id', null);

        $datatagihan = $jenistagihan->get();


        return view('livewire.tunggakan.index', \compact('datatagihan',))
            ->extends('dashboard.base')
            ->section('content');
    }
}
