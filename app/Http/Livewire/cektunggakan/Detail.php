<?php

namespace App\Http\Livewire\cektunggakan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\{Tagihan, santri};

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
    public $santri_id;





    public function mount($id)
    {

        $data = santri::where('id', $id);

        $santri = $data->first();


        if (!is_null($santri)) {
            $this->santri_id = $santri->id;
        }

        $this->data();
    }

    private function data()
    {


        $this->TagihanBulanan = Tagihan::select(
            'jenis_tagihan_id',
            'santri_id',
            DB::raw('sum(jumlah) as total'),
            DB::raw('sum(if(tempo < CURDATE() AND status = "belum" ,jumlah, 0 )) as tunggakan'),
            DB::raw('sum(if(status = "lunas",jumlah, 0 )) as dibayar'),
            DB::raw('sum(jumlah) - sum(if(status = "lunas", jumlah, 0)) as status'),
        )
            ->where('santri_id', $this->santri_id)
            ->with('jenis')
            ->whereHas('jenis', function ($query) {
                $query->where('tipe', 1);
            })
            ->where('tempo', '<', date('Y-m-d'))
            ->groupBy('jenis_tagihan_id')
            ->get();

        $this->tagihanPeriode = Tagihan::select(
            'id',
            'jenis_tagihan_id',
            'santri_id',
            DB::raw('jumlah as total'),
            'status',
        )
            ->where('tempo', '<', date('Y-m-d'))
            ->where('santri_id', $this->santri_id)
            ->with('jenis')
            ->with('bayar')
            ->whereHas('jenis', function ($query) {
                $query->where('tipe', 2);
            })
            ->withCount(['bayar' => function ($query) {
                $query->select(DB::raw('sum(jumlah) as dibayar'));
            }])


            ->get();
    }

    public function resetdata()
    {
        $this->data();
        $this->detail = false;
        $this->detail = false;
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
        return view('livewire.cektunggakan.detail');
    }
}
