<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use App\Tagihan;
use App\Transaksi;
use App\Bayar;
use Illuminate\Support\Facades\DB;

class Bulanan extends Component
{
    public $DetailTagihan;
    public $Tagihan;
    public $nama;
    public $IdTagihan;

    public function mount($id, $nama)
    {
        $this->nama = $nama;
        $this->IdTagihan = $id;
        $this->dataTagihan();
    }

    public function bayar($id)
    {

        $tagihan = Tagihan::where('id', $id)->first();
        $codeBayar = CodeBayar();
        $codeTransaksi = CodeTransaksi();


        Bayar::create([
            'id_tagihan' => $id,
            'id_bayar' =>  $codeBayar,
            'id_transaksi' => $codeTransaksi

        ]);

        Transaksi::create([
            'id_transaksi' => $codeTransaksi,
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
        $tagihan = Tagihan::where('id', $id)->with('bayar')->first();
        Transaksi::where('id_transaksi', $tagihan->bayar->id_transaksi)->delete();
        Bayar::where('id_bayar', $tagihan->id_bayar)->delete();
        $this->dataTagihan();
        session()->flash('message', '<div class="alert alert-danger">
                    tagihan berhasil di bayar
                </div>');
    }

    public function dataTagihan()
    {
        $this->DetailTagihan = Tagihan::where('id_tagihan', $this->IdTagihan)->get();
        $this->Tagihan = Tagihan::select(
            'id_tagihan',
            DB::raw('sum(jumlah) as total'),
            DB::raw('sum(if(jatuh_tempo < CURDATE() AND status = "belum" ,jumlah, 0 )) as tunggakan'),
            DB::raw('sum(if(status = "lunas",jumlah, 0 )) as dibayar'),
            DB::raw('sum(jumlah) - sum(if(status = "lunas", jumlah, 0)) as status'),
        )
            ->with('jenis')
            ->where('id_tagihan', $this->IdTagihan)
            ->get();
    }


    public function render()
    {
        return view('livewire.transaksi.bulanan');
    }
}
