<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use App\Tagihan;
use App\Transaksi;
use App\Bayar;
use Illuminate\Support\Facades\DB;


class Detail extends Component
{

    public $TagihanBulanan  = [];
    public $tagihanPeriode  = [];
    public $detail = false;
    public $jenis;
    public $DetailTagihan = [];
    public $DetailBayar = [];
    public $nama;
    public $biaya;
    public $t;
    public $Idsantri;


    protected $listeners = ['reset' => 'resetdata'];


    public function mount($id)
    {
        $this->Idsantri = $id;
        $this->data();
    }

    private function data()
    {
        $this->TagihanBulanan = Tagihan::select(
            'daftar_tgh_id',
            'santri_id',
            DB::raw('sum(jumlah) as total'),
            DB::raw('sum(if(jatuh_tempo < CURDATE() AND status = "belum" ,jumlah, 0 )) as tunggakan'),
            DB::raw('sum(if(status = "lunas",jumlah, 0 )) as dibayar'),
            DB::raw('sum(jumlah) - sum(if(status = "lunas", jumlah, 0)) as status'),
        )
            ->where('santri_id', $this->Idsantri)
            ->with('jenis')
            ->whereHas('jenis', function ($query) {
                $query->where('id_jenis', 1);
            })
            ->groupBy('daftar_tgh_id')
            ->get();





        $this->tagihanPeriode = Tagihan::select(
            'id',
            'daftar_tgh_id',
            'santri_id',
            DB::raw('sum(jumlah) as total'),
            DB::raw('sum(jumlah) - sum(if(status = "lunas", jumlah, 0)) as status'),
        )

            ->where('santri_id', $this->Idsantri)
            ->with('jenis')
            ->with('bayar')
            ->whereHas('jenis', function ($query) {
                $query->where('id_jenis', 2);
            })
            ->withCount(['bayar' => function ($query) {
                $query->select(DB::raw('sum(jumlah) as dibayar'));
            }])

            ->groupBy('daftar_tgh_id')
            ->get();
    }

    public function resetdata()
    {
        $this->data();
    }

    public function detail($id)
    {
        $this->detail = true;
        $this->jenis = true;

        $this->t = $id;
    }

    public function periode($id)
    {

        $this->t = $id;
        $this->detail = true;
        $this->jenis = false;
    }







    public function render()
    {
        return view('livewire.transaksi.detail');
    }
}
