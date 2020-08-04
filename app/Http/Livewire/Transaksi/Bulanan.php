<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use App\Tagihan;
use App\Transaksi;
use App\Bayar;
use App\santri;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;

use Illuminate\Support\Facades\Storage;

class Bulanan extends Component
{


    public $DetailTagihan;
    public $Tagihan;
    public $nama;
    public $IdTagihan;
    public $Idsantri;
    public $select = array();
    public $pdf;

    public function mount($id, $Idsantri)
    {

        $this->Idsantri = $Idsantri;
        $this->IdTagihan = $id;
        $this->dataTagihan();
    }

    public function updated($field)
    {
        $this->dataTagihan();
    }


    public function bayar($id)
    {


        $tagihan = Tagihan::where('id', $id)->first();
        $codeBayar = Str::Uuid();
        $codeTransaksi = Str::Uuid();


        $bayar =   Bayar::create([
            'id' => $id,
            'tagihan_id' =>  $codeBayar,
            'id_transaksi' => $codeTransaksi,
            'jumlah' => $tagihan->jumlah,
            'status' => 1
        ]);



        $codeTransaksi = Transaksi::create([
            'id_transaksi' => $bayar->id_transaksi,
            'tanggal' => date("Y-m-d"),
            'jumlah' => $tagihan->jumlah,
            'jenis' => 1
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
        Transaksi::where('id_transaksi', $tagihan->bayarbulanan->id_transaksi)->delete();
        Bayar::where('id', $tagihan->bayarbulanan->id)->delete();
        $this->dataTagihan();
        session()->flash('message', '<div class="alert alert-danger">
                    tagihan berhasil di bayar
                </div>');
    }

    public function dataTagihan()
    {
        $this->DetailTagihan = Tagihan::where('daftar_tgh_id', $this->IdTagihan)
            ->Where('santri_id', $this->Idsantri)
            ->with('bayarbulanan')
            ->get();


        $this->Tagihan = Tagihan::select(
            'id',
            'daftar_tgh_id',
            DB::raw('sum(jumlah) as total'),
            DB::raw('sum(if(jatuh_tempo < CURDATE() AND status = "belum" ,jumlah, 0 )) as tunggakan'),
            DB::raw('sum(if(status = "lunas",jumlah, 0 )) as dibayar'),
            DB::raw('sum(jumlah) - sum(if(status = "lunas", jumlah, 0)) as status'),
        )
            ->with('jenis')
            ->where('daftar_tgh_id', $this->IdTagihan)
            ->Where('santri_id', $this->Idsantri)
            ->get();
    }

    public function cetak()
    {
        $santri = santri::find($this->Idsantri);

        $tagihan =
            Tagihan::whereIn('id', $this->select)
            ->with('bayarbulanan')
            ->get();


        $detail = Tagihan::Where('daftar_tgh_id', $this->IdTagihan)
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
