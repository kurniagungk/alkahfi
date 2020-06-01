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
    public $tahun = [];
    public $tempo;



    public function render()
    {
        return view('livewire.tagihan.tambah');
    }
    public function updatedperiode($value)
    {
        $this->dataJenis = DaftarTagihan::where('id_jenis', $value)->with('tahun')->get();
        $this->jenis = $this->dataJenis['0']->id_tagihan;


        $awal = date_create_from_format('Y-m-d', substr($this->dataJenis['0']->tahun->awal, 0, 8) . '01');
        $akhir = date_create_from_format('Y-m-d', substr($this->dataJenis['0']->tahun->akhir, 0, 8) . '01');
        $selisih = date_diff($awal, $akhir);

        $this->tahun = array(
            'awal' => $awal,
            'akhir' => $akhir,
            'selisih' => $selisih->m
        );
    }

    function updatedjenis()
    {

        $awal = date_create_from_format('Y-m-d', substr($this->dataJenis['0']->tahun->awal, 0, 8) . '01');
        $akhir = date_create_from_format('Y-m-d', substr($this->dataJenis['0']->tahun->akhir, 0, 8) . '01');
        $selisih = date_diff($awal, $akhir);

        $this->tahun = array(
            'awal' => $awal,
            'akhir' => $akhir,
            'selisih' => $selisih->m
        );
    }

    public function mount()
    {
        $this->DataKelas = Kelas::latest()->get();
    }




    public function tambah()
    {

        $santri = santri::select('id_santri')->get();
        if ($this->select == 2) {

            $santri = santri::where('kelas', $this->kelas)->get();
        }



        if ($this->periode == 1) {
            foreach ($santri as $data) {
                $id_santri = $data->id_santri;
                for ($i = 0; $i <= $this->tahun['selisih']; $i++) {
                    $tempo = date('Y-m-d', strtotime("+$i month", strtotime($this->tahun['awal']['date'])));
                    $data = array(
                        'id_tagihan' => $this->jenis,
                        'id_santri' => $id_santri,
                        'jatuh_tempo' => $tempo,
                        'jumlah' => $this->biaya,
                        'status' => 2
                    );

                    Tagihan::insert($data);
                    session()->flash('message', 'tagihan berhasil ditambah');
                }
            }
        } else {
            foreach ($santri as $data) {
                $id_santri = $data->id_santri;

                $data = array(
                    'id_tagihan' => $this->jenis,
                    'id_santri' => $id_santri,
                    'jatuh_tempo' => $this->tempo,
                    'jumlah' => $this->biaya,
                    'status' => 2
                );
                Tagihan::insert($data);
                session()->flash('message', 'tagihan berhasil ditambah');
            }
        }
    }
}
