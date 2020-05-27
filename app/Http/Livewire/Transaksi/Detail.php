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

        $this->dataTagihan($id);

        $this->nama = $nama;
    }

    public function periode($id, $nama)
    {
        $this->detail = true;

        $this->jenis = false;

        $this->dataTagihan($id);

        $this->nama = $nama;

        $bayar = Bayar::where('id_tagihan', $id)->get();
        $data = [];
        foreach ($bayar as $b) {
            $transaksi = Transaksi::where('id_transaksi', $b->id_transaksi)->first();
            $data[] = array(
                'tanggal' => $transaksi->tanggal,
                'jumlah' => $transaksi->jumlah
            );
        }
        $this->DetailBayar = $data;
    }

    public function bayar($id, $idt)
    {

        $data = array(
            'status' => 'lunas',
        );
        Tagihan::where('id', $id)->update($data);
        $this->dataTagihan($idt);
        session()->flash('message', '<div class="alert alert-success">
                    tagihan berhasil di bayar
                </div>');
    }
    public function hapus($id, $idt)
    {

        $data = array(
            'status' => 'belum',
        );
        Tagihan::where('id', $id)->update($data);
        $this->dataTagihan($idt);
        session()->flash('message', '<div class="alert alert-danger">
                    tagihan berhasil di bayar
                </div>');
    }

    private function dataTagihan($id)
    {
        $this->DetailTagihan = Tagihan::where('id_tagihan', $id)->get();
    }


    public function render()
    {
        return view('livewire.transaksi.detail');
    }
}
