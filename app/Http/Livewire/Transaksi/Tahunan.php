<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use App\Tagihan;
use App\Transaksi;
use App\Bayar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Tahunan extends Component
{

    public $DetailTagihan;
    public $Tagihan;
    public $nama;
    public $IdTagihan;
    public $biaya;
    public $Tunggakan;
    public $Total;
    public $Dibayar;
    public $Idsantri;

    public function mount($id, $Idsantri)
    {
        $this->IdTagihan = $id;
        $this->Idsantri = $Idsantri;
        $this->transaksi();
    }

    private function transaksi()
    {
        $bayar = Bayar::where('id_tagihan', $this->IdTagihan)
            ->get();


        $data = [];

        foreach ($bayar as $b) {
            $transaksi = Transaksi::where('id_transaksi', $b->id_transaksi)
                ->first();

            $data[] = array(
                'id_transaksi' => $transaksi->id_transaksi,
                'tanggal' => $transaksi->tanggal,
                'jumlah' => $transaksi->jumlah
            );
        }
        $this->DetailTagihan = $data;
        $Tagihan =
            Tagihan::select(
                'id',
                'id_tagihan',
                'id_santri',
                DB::raw('sum(jumlah) as total'),
            )
            ->withCount(['bayar' => function ($query) {
                $query->select(DB::raw('sum(jumlah) as dibayar'));
            }])
            ->Where('id_santri', $this->Idsantri)
            ->with('jenis')
            ->where('id', $this->IdTagihan)
            ->first();
        $this->Tagihan = $Tagihan;
        $this->Total = $Tagihan->total;
        $this->Tunggakan = $Tagihan->total - $Tagihan->bayar_count;
        $this->Dibayar = $Tagihan->bayar_count;
    }

    public function bayar($id)
    {

        $codeBayar = Str::Uuid();
        $codeTransaksi = Str::Uuid();

        $messages = [
            'biaya.max' => 'Pembayaran melebihan tagihan',
        ];
        $this->validate([
            'biaya' => 'required|integer',
        ], $messages);

        if ($this->Tunggakan - $this->biaya < 0) {

            $this->validate([
                'biaya' => 'max:0',
            ], $messages);
        }



        $bayar = Bayar::create([
            'id_tagihan' => $id,
            'id_bayar' =>  $codeBayar,
            'jumlah' => $this->biaya,
            'id_transaksi' => $codeTransaksi
        ]);



        $codeTransaksi =   Transaksi::create([
            'id_transaksi' => $bayar->id_transaksi,
            'tanggal' => date("Y-m-d"),
            'jumlah' => $this->biaya,
            'jenis' => 1
        ]);



        $this->transaksi();
        $this->reset('biaya');
        session()->flash('message', '<div class="alert alert-success">
                    tagihan berhasil di bayar
                </div>');
    }

    public function hapus($id)
    {
        Bayar::where('id_transaksi', $id)->delete();
        Transaksi::where('id_transaksi', $id)->delete();
        $this->transaksi();
        session()->flash('message', '<div class="alert alert-danger">
                    tagihan berhasil di hapus
                </div>');
    }





    public function render()
    {
        return view('livewire.transaksi.tahunan');
    }
}
