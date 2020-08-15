<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;
use Illuminate\Support\Facades\Auth;

use App\Tagihan;
use App\Transaksi;
use App\Bayar;
use App\santri;



use Illuminate\Support\Facades\Storage;

class Bulanan extends Component
{


    public $DetailTagihan;
    public $Tagihan;
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


    public function bayar($id)
    {
        $userId = Auth::id();

        $tagihan = Tagihan::where('id', $id)->first();
        $codeTransaksi = Str::Uuid();


        $bayar =   Bayar::create([
            'id' => $codeTransaksi,
            'tagihan_id' =>  $tagihan->id,
            'transaksi_id' => $codeTransaksi,
            'jumlah' => $tagihan->jumlah,
            'status' => 1,
            'user_id' => $userId
        ]);



        $codeTransaksi = Transaksi::create([
            'id' => $bayar->transaksi_id,
            'jumlah' => $tagihan->jumlah,
            'jenis' => 1,
            'user_id' => $userId
        ]);


        $data = array(
            'status' => 'lunas',
        );
        Tagihan::where('id', $id)->update($data);
        $this->dataTagihan();
        session()->flash('message', '<div class="alert alert-success">
                    tagihan berhasil di bayar
                </div>');
    }

    public function hapus($id)
    {
        $data = array(
            'status' => 'belum',
        );
        Tagihan::where('id', $id)->update($data);


        $tagihan = Tagihan::where('id', $id)->with('bayarbulanan')->first();
        Transaksi::where('id', $tagihan->bayarbulanan->transaksi_id)->delete();
        Bayar::where('id', $tagihan->bayarbulanan->id)->delete();
        $this->dataTagihan();
        session()->flash('message', '<div class="alert alert-danger">
                    tagihan berhasil di bayar
                </div>');
    }

    public function dataTagihan()
    {
        $this->DetailTagihan = Tagihan::where('jenis_tagihan_id', $this->tagihan_id)
            ->Where('santri_id', $this->santri_id)
            ->with('bayarbulanan')
            ->get();


        $this->Tagihan = Tagihan::select(
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
        $pdf->setPaper('A4', 'landscape');
        Storage::disk('public')->put('pdf/invoice.pdf', $pdf->output());
        $this->emit('download');
    }


    public function render()
    {
        return view('livewire.transaksi.bulanan');
    }
}
