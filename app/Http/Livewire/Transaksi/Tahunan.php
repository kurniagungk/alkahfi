<?php

namespace App\Http\Livewire\Transaksi;

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

    public function bayar($id)
    {
        $userId = Auth::id();

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
            'transaksi_id' => $codeTransaksi,
            'jumlah' => $this->biaya,
            'user_id' => $userId
        ]);

        $Transaksi =   Transaksi::create([
            'id' => $bayar->transaksi_id,
            'jumlah' => $this->biaya,
            'tipe' => 1,
            'user_id' => $userId
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
        Transaksi::where('id', $id)->delete();
        $this->transaksi();
        session()->flash('message', '<div class="alert alert-danger">
                    tagihan berhasil di hapus
                </div>');
    }


    public function cetak()
    {
        $santri = santri::find($this->santri_id);

        $tagihan =
            Bayar::whereIn('id', $this->select)
            ->get();

        $detail =
            Tagihan::where('id', $this->tagihan_id)
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
