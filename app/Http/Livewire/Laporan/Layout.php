<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\santri;
use App\Jenis_tagihan;
use App\Tagihan;

class Layout extends Component
{

    public $data;
    public $tagihan;

    public function mount()
    {
        $santri = santri::where('nisn', '0021487587')->get();

        $jenistagihan = Jenis_tagihan::with(['tagihan' => function ($query) {
            $query->whereHas('bayar');
            $query->withCount(['bayar AS bayar' => function ($query) {
                $query->select(DB::raw('SUM(JUMLAH)'));
            }]);
        }])
            ->get();

        $data = [];

        foreach ($santri as $s) {
            $datasantri = [];
            $datasantri['nama'] = $s->nama;
            $datasantri['kelas'] = $s->kelas->kelas;
            $datatagihan = [];
            foreach ($jenistagihan as $j) {

                $tagihan = Tagihan::where('santri_id', $s->id)
                    ->whereHas('bayar')
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
        $this->tagihan = $jenistagihan;
    }

    public function render()
    {
        return view('livewire.laporan.layout');
    }
}
