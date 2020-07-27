<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use App\Tagihan;
use App\Transaksi;
use App\Bayar;
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


    public function mount($id)
    {
        $this->TagihanBulanan = Tagihan::select(
            'id_tagihan',
            'id_santri',
            DB::raw('sum(jumlah) as total'),
            DB::raw('sum(if(jatuh_tempo < CURDATE() AND status = "belum" ,jumlah, 0 )) as tunggakan'),
            DB::raw('sum(if(status = "lunas",jumlah, 0 )) as dibayar'),
            DB::raw('sum(jumlah) - sum(if(status = "lunas", jumlah, 0)) as status'),
        )
            ->where('id_santri', $id)
            ->with('jenis')
            ->whereHas('jenis', function ($query) {
                $query->where('id_jenis', 1);
            })
            ->groupBy('id_tagihan')
            ->get();

        $this->tagihanPeriode = Tagihan::select(
            'id',
            'id_tagihan',
            'id_santri',
            DB::raw('sum(jumlah) as total'),
            DB::raw('sum(if(jatuh_tempo < CURDATE() AND status = "belum" ,jumlah, 0 )) as tunggakan'),
            DB::raw('sum(if(status = "lunas",jumlah, 0 )) as dibayar'),
            DB::raw('sum(jumlah) - sum(if(status = "lunas", jumlah, 0)) as status'),
        )
            ->where('id_santri', $id)
            ->with('jenis')
            ->whereHas('jenis', function ($query) {
                $query->where('id_jenis', 2);
            })
            ->groupBy('id_tagihan')
            ->get();
    }

    public function detail($id, $nama)
    {
        $this->detail = true;
        $this->jenis = true;

        $this->t = $id;
        $this->dataTagihan();

        $this->nama = $nama;
    }

    public function periode($id, $nama)
    {
        $this->nama = $nama;
        $this->t = $id;
        $this->detail = true;
        $this->jenis = false;
        $this->dataTagihan();
        $this->transaksi();
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

    public function bayarp($id)
    {

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
            'jumlah' => $this->biaya,
            'jenis' => 1
        ]);


        $data = array(
            'status' => 'lunas',
        );
        Tagihan::where('id', $id)->update($data);
        $this->transaksi();
        session()->flash('message', '<div class="alert alert-success">
                    tagihan berhasil di bayar
                </div>');
    }

    private function transaksi()
    {
        $bayar = Bayar::where('id_tagihan', $this->t)->get();


        $data = [];
        foreach ($bayar as $b) {
            $transaksi = Transaksi::where('id_transaksi', $b->id_transaksi)->first();

            $data[] = array(
                'id_transaksi' => $transaksi->id_transaksi,
                'tanggal' => $transaksi->tanggal,
                'jumlah' => $transaksi->jumlah
            );
        }
        $this->DetailBayar = $data;
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

    public function hapusp($id)
    {
        Bayar::where('id_transaksi', $id)->delete();
        Transaksi::where('id_transaksi', $id)->delete();
        $this->transaksi();
        session()->flash('message', '<div class="alert alert-danger">
                    tagihan berhasil di hapus
                </div>');
    }

    private function dataTagihan()
    {
        $this->DetailTagihan = Tagihan::where('id_tagihan', $this->t)->get();
    }





    public function render()
    {
        return view('livewire.transaksi.detail');
    }
}
