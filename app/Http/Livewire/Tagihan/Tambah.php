<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\Component;
use App\DaftarTagihan;
use App\santri;
use App\Tagihan;
use App\Kelas;

class Tambah extends Component
{

    public $periode;
    public $dataJenis = [];
    public $DataKelas = [];
    public $jenis;
    public $kelas;
    public $biaya;
    public $select = 1;



    public function render()
    {
        return view('livewire.tagihan.tambah');
    }
    public function updatedperiode($value)
    {
        $this->dataJenis = DaftarTagihan::where('id_jenis', $value)->get();
        $this->jenis = $this->dataJenis['0']->id_tagihan;
        $this->jenis = $this->dataJenis['0']->id_tagihan;
    }

    public function mount()
    {
        $this->DataKelas = Kelas::latest()->get();
    }




    public function tambah()
    {


        if ($this->periode == 1) {
            $tanggal = "2020-07-10";

            $santri = santri::select('id_santri')->get();
            foreach ($santri as $data) {
                $id_santri = $data->id_santri;
                for ($i = 0; $i < 12; $i++) {
                    $tempo = date('Y-m-d', strtotime("+$i month", strtotime($tanggal)));
                    $data = array(
                        'id_tagihan' => $this->jenis,
                        'id_santri' => $id_santri,
                        'jatuh_tempo' => $tempo,
                        'jumlah' => $this->biaya,
                        'status' => 2
                    );

                    Tagihan::insert($data);
                }
            }
        }
    }
}
