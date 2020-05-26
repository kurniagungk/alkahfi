<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use App\Tagihan;
use Illuminate\Support\Facades\DB;

class Detail extends Component
{

    public $TagihanBulanan  = [];
    public $tagihanPeriode  = [];
    public $detail = true;
    public $DetailTagihan = [];
    public $nama;

    public function mount($id)
    {
        $this->TagihanBulanan = Tagihan::select(
            'id_tagihan',
            'id_santri',
            DB::raw('sum(jumlah) as total'),
            DB::raw('sum(if(jatuh_tempo < CURDATE() AND status = "belum" ,jumlah, 0 )) as tunggakan'),
            DB::raw('sum(if(status = "lunas",jumlah, 0 )) as dibayar'),
            DB::raw('sum(jumlah) - sum(if(status = "lunas", jumlah, 0)) as status'),
        )
            ->where('id_santri', $id)
            ->with('jenis')
            ->whereHas('jenis', function ($query) {
                $query->where('id_jenis', 1);
            })
            ->groupBy('id_tagihan')
            ->get();

        $this->tagihanPeriode = Tagihan::select(
            'id_tagihan',
            'id_santri',
            DB::raw('sum(jumlah) as total'),
            DB::raw('sum(if(jatuh_tempo < CURDATE() AND status = "belum" ,jumlah, 0 )) as tunggakan'),
            DB::raw('sum(if(status = "lunas",jumlah, 0 )) as dibayar'),
            DB::raw('sum(jumlah) - sum(if(status = "lunas", jumlah, 0)) as status'),
        )
            ->where('id_santri', $id)
            ->with('jenis')
            ->whereHas('jenis', function ($query) {
                $query->where('id_jenis', 2);
            })
            ->groupBy('id_tagihan')
            ->get();
    }

    public function detail($id, $nama)
    {
        $this->detail = false;

        $this->DetailTagihan = Tagihan::where('id_tagihan', $id)->get();

        $this->nama = $nama;
    }

    public function asd()
    {
    }



    public function render()
    {
        return view('livewire.transaksi.detail');
    }
}
