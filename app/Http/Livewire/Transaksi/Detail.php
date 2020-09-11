<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

use App\Tagihan;
use App\Transaksi;
use App\Bayar;
use App\santri;
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
    public $santri_id;


    protected $listeners = ['reset' => 'resetdata'];


    public function mount($id)
    {






        $data = santri::where(function (Builder $query) use ($id) {
            return $query->Where('nism', $id)
                ->orWhere('nisn', $id);
        });

        $user = Auth::user();


        if (!$user->hasRole('admin'))
            $data->where('sekolah_id', $user->sekolah_id);

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
            ->groupBy('jenis_tagihan_id')
            ->get();


        $this->tagihanPeriode = Tagihan::select(
            'id',
            'jenis_tagihan_id',
            'santri_id',
            DB::raw('sum(jumlah) as total'),
            DB::raw('sum(jumlah) - sum(if(status = "lunas", jumlah, 0)) as status'),
        )

            ->where('santri_id', $this->santri_id)
            ->with('jenis')
            ->with('bayar')
            ->whereHas('jenis', function ($query) {
                $query->where('tipe', 2);
            })
            ->withCount(['bayar' => function ($query) {
                $query->select(DB::raw('sum(jumlah) as dibayar'));
            }])

            ->groupBy('jenis_tagihan_id')
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
