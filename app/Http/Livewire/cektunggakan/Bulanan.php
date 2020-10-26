<?php

namespace App\Http\Livewire\cektunggakan;

use Livewire\Component;
use Illuminate\{Support\Facades\DB, Support\Facades\Auth, Support\Str};
use PDF;
use App\{Tagihan, Transaksi,  Bayar, santri};
use Illuminate\Support\Facades\Storage;

class Bulanan extends Component
{


    public $DetailTagihan;
    public $nama;
    public $tagihan_id;
    public $santri_id;
    public $select = array();
    public $pdf;

    public function mount($id, $santri_id)
    {

        $this->santri_id = $santri_id;
        $this->tagihan_id = $id;
        $this->dataTagihan();
    }

    public function updated($field)
    {
        $this->dataTagihan();
    }



    public function dataTagihan()
    {
        $this->DetailTagihan = Tagihan::where('jenis_tagihan_id', $this->tagihan_id)
            ->where('tempo', '<', date('Y-m-d'))
            ->where('status', 'belum')
            ->Where('santri_id', $this->santri_id)
            ->with('bayarbulanan')
            ->orderBy('tempo', 'asc')
            ->get();
    }

    public function cetak()
    {
        $santri = santri::find($this->santri_id);

        $tagihan =
            Tagihan::whereIn('id', $this->select)
            ->with('bayarbulanan')
            ->get();


        $detail = Tagihan::Where('jenis_tagihan_id', $this->tagihan_id)
            ->with('jenis')
            ->first();


        $data = [
            'santri' => $santri,
            'tagihan' => $tagihan,
            'detail' => $detail
        ];


        $pdf = PDF::loadview('print.kwitansibulanan', compact('data'));
        $pdf->setPaper('A4');

        Storage::disk('public')->put('pdf/invoice.pdf', $pdf->output());
        $this->emit('download');
    }


    public function render()
    {
        $Tagihan = Tagihan::select(
            'id',
            'jenis_tagihan_id',
            DB::raw('sum(jumlah) as total'),
            DB::raw('sum(if(tempo < CURDATE() AND status = "belum" ,jumlah, 0 )) as tunggakan'),
            DB::raw('sum(if(status = "lunas",jumlah, 0 )) as dibayar'),
            DB::raw('sum(jumlah) - sum(if(status = "lunas", jumlah, 0)) as status'),
        )
            ->with('jenis')
            ->where('jenis_tagihan_id', $this->tagihan_id)
            ->Where('santri_id', $this->santri_id)
            ->get();

        return view('livewire.cektunggakan.bulanan', compact('Tagihan'));
    }
}
