<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use App\Tagihan;
use App\Transaksi;
use App\Bayar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Bulanan extends Component
{
    public $DetailTagihan;
    public $Tagihan;
    public $nama;
    public $IdTagihan;
    public $Idsantri;
    public $select = array();

    public function mount($id, $Idsantri)
    {

        $this->Idsantri = $Idsantri;
        $this->IdTagihan = $id;
        $this->dataTagihan();
    }

    public function updatingselect()
    {
        $this->dataTagihan();
    }

    public function bayar($id)
    {


        $tagihan = Tagihan::where('id', $id)->first();
        $codeBayar = Str::Uuid();
        $codeTransaksi = Str::Uuid();


        $bayar =   Bayar::create([
            'id_tagihan' => $id,
            'id_bayar' =>  $codeBayar,
            'id_transaksi' => $codeTransaksi,
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
        Bayar::where('id_bayar', $tagihan->bayarbulanan->id_bayar)->delete();
        $this->dataTagihan();
        session()->flash('message', '<div class="alert alert-danger">
                    tagihan berhasil di bayar
                </div>');
    }

    public function dataTagihan()
    {
        $this->DetailTagihan = Tagihan::where('id_tagihan', $this->IdTagihan)
            ->Where('id_santri', $this->Idsantri)
            ->get();


        $this->Tagihan = Tagihan::select(
            'id',
            'id_tagihan',
            DB::raw('sum(jumlah) as total'),
            DB::raw('sum(if(jatuh_tempo < CURDATE() AND status = "belum" ,jumlah, 0 )) as tunggakan'),
            DB::raw('sum(if(status = "lunas",jumlah, 0 )) as dibayar'),
            DB::raw('sum(jumlah) - sum(if(status = "lunas", jumlah, 0)) as status'),
        )
            ->with('jenis')
            ->where('id_tagihan', $this->IdTagihan)
            ->Where('id_santri', $this->Idsantri)
            ->get();
    }


    public function render()
    {
        return view('livewire.transaksi.bulanan');
    }
}
