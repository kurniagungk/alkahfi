<?php

namespace App\Http\Livewire\cektunggakan;

use Livewire\Component;
use Illuminate\{Support\Facades\Auth, Support\Str, Support\Facades\Storage, Support\Facades\DB};
use App\{Tagihan, Transaksi, Bayar, santri};
use PDF;



class Tahunan extends Component
{

    public $DetailTagihan;
    public $Tagihan;
    public $nama;
    public $tagihan_id;
    public $biaya;
    public $Tunggakan;
    public $Total;
    public $Dibayar;
    public $santri_id;
    public $select = array();

    public function mount($id, $santri_id)
    {
        $this->tagihan_id = $id;
        $this->santri_id = $santri_id;
        $this->transaksi();
    }

    private function transaksi()
    {
        $this->DetailTagihan = Bayar::where('tagihan_id', $this->tagihan_id)
            ->orderBy('created_at', 'asc')
            ->get();



        $Tagihan =
            Tagihan::select(
                'id',
                'jenis_tagihan_id',
                'santri_id',
                DB::raw('sum(jumlah) as total'),
            )
            ->withCount(['bayar' => function ($query) {
                $query->select(DB::raw('sum(jumlah) as dibayar'));
            }])
            ->Where('santri_id', $this->santri_id)
            ->with('jenis')
            ->where('id', $this->tagihan_id)
            ->first();

        $Tunggakan = $Tagihan->total - $Tagihan->bayar_count;
        $this->Tagihan = $Tagihan;
        $this->Total = $Tagihan->total;
        $this->Tunggakan = $Tagihan->total - $Tagihan->bayar_count;
        $this->Dibayar = $Tagihan->bayar_count;

        $tagihan = Tagihan::find($this->tagihan_id);
        if ($Tunggakan > 0)
            $tagihan->status = 'belum';
        else
            $tagihan->status = 'lunas';

        $tagihan->save();
    }










    public function render()
    {
        return view('livewire.cektunggakan.tahunan');
    }
}
