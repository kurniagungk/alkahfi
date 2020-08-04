<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use App\Tagihan;
use App\Transaksi;
use App\Bayar;
use App\santri;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PDF;
use Illuminate\Support\Facades\Storage;

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
    public $select = array();

    public function mount($id, $Idsantri)
    {
        $this->IdTagihan = $id;
        $this->Idsantri = $Idsantri;
        $this->transaksi();
    }

    private function transaksi()
    {
        $this->DetailTagihan = Bayar::where('tagihan_id', $this->IdTagihan)
            ->get();


        $Tagihan =
            Tagihan::select(
                'id',
                'daftar_tgh_id',
                'santri_id',
                DB::raw('sum(jumlah) as total'),
            )
            ->withCount(['bayar' => function ($query) {
                $query->select(DB::raw('sum(jumlah) as dibayar'));
            }])
            ->Where('santri_id', $this->Idsantri)
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


        $bayar =   Bayar::create([
            'tagihan_id' => $id,
            'id' =>  $codeBayar,
            'id_transaksi' => $codeTransaksi,
            'jumlah' => $this->biaya,
        ]);


        $Transaksi =   Transaksi::create([
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

        Bayar::where('id', $id)->delete();
        Transaksi::where('id_transaksi', $id)->delete();
        $this->transaksi();
        session()->flash('message', '<div class="alert alert-danger">
                    tagihan berhasil di hapus
                </div>');
    }


    public function cetak()
    {
        $santri = santri::find($this->Idsantri);

        $tagihan =
            Bayar::whereIn('id', $this->select)
            ->get();

        $detail =
            Tagihan::where('id', $this->IdTagihan)
            ->with('jenis')
            ->first();


        $data = [
            'santri' => $santri,
            'tagihan' => $tagihan,
            'detail' => $detail

        ];

        $pdf = PDF::loadview('print.kwitansicicil', compact('data'));
        $pdf->setPaper('A4', 'landscape');
        Storage::disk('public')->put('pdf/invoice.pdf', $pdf->output());
        $this->emit('download');
    }



    public function render()
    {
        return view('livewire.transaksi.tahunan');
    }
}
