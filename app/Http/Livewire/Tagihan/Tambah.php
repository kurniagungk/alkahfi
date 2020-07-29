<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\Component;
use App\DaftarTagihan;
use App\santri;
use App\Tagihan;
use App\Kelas;
use App\asrama;
use Illuminate\Database\Eloquent\Builder;


class Tambah extends Component
{

    public $periode;
    public $dataJenis = [];
    public $DataSelect = [];
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
        if (is_null($this->dataJenis)) {
            dd($this->dataJenis, true);
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
    }

    function updatedselect($value)
    {

        $this->reset('DataSelect');
        if ($value == 2) {
            $this->DataSelect = Kelas::latest()->get();
        } elseif ($value == 3) {
            $this->DataSelect = asrama::latest()->get();
        } else {
            $this->DataSelect = null;
        }
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



    public function tambah()
    {


        $this->validate([
            'jenis' => 'required',
            'tempo' => 'required',
            'biaya' => 'required|numeric',
        ]);


        if ($this->select == 2) {
            $santri = santri::where('id_kelas', $this->kelas)->get();
        } elseif ($this->select == 3) {
            $santri = santri::whereHas('asrama', function (Builder $query) {
                $query->where('id', $this->kelas);
            })->get();
        } else {
            $santri = santri::select('id_santri')->get();
        }



        if ($this->periode == 1) {
            $this->validate([
                'tempo' => 'numeric|min:1|max:29',
            ]);
            foreach ($santri as $data) {
                $id_santri = $data->id_santri;
                for ($i = 0; $i <= $this->tahun['selisih']; $i++) {
                    $tempo = date('Y-m-d', strtotime("+$i month", strtotime($this->tahun['awal']['date'])));
                    $data = array(
                        'id_tagihan' => $this->jenis,
                        'id_santri' => $id_santri,
                        'jatuh_tempo' => $tempo,
                        'jumlah' => $this->biaya,
                    );

                    Tagihan::insert($data);
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
                );
                Tagihan::insert($data);
            }
        }

        $this->reset();
        session()->flash('message', 'tagihan berhasil ditambah');
    }
}
