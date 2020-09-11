<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TagihanImport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


use App\santri;
use App\Tagihan;
use App\Kelas;
use App\asrama;
use App\Jenis_tagihan;



class Tambah extends Component
{

    use WithFileUploads;

    public $periode;
    public $dataJenis = [];
    public $DataSelect = [];
    public $jenis;
    public $kelas;
    public $biaya;
    public $select = 1;
    public $tahun = [];
    public $tempo;
    public $custom;



    public function render()
    {
        return view('livewire.tagihan.tambah');
    }


    public function updatedperiode($value)
    {
        $this->reset('jenis');
        $this->dataJenis = Jenis_tagihan::where('tipe', $value)->with('tahun')->get();

        if (is_null($this->dataJenis)) {
            dd($this->dataJenis);
            $this->jenis = $this->dataJenis['0']->daftar_tgh_id;

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
            $user = Auth::user();

            if (!$user->hasRole('admin')) {
                $kelas = Kelas::where('id', $user->sekolah_id)->get();
            } else {
                $kelas = Kelas::get();
            }

            $this->DataSelect = $kelas;
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
            $santri = santri::where('kelas_id', $this->kelas)->get();
        } elseif ($this->select == 3) {
            $santri = santri::whereHas('asrama', function (Builder $query) {
                $query->where('id', $this->kelas);
            })->get();
        } elseif ($this->select == 4) {
            $this->validate([
                'kelas' => 'required|mimes:xls,xlsx'
            ]);
            $fileExcel = $this->kelas->getRealPath();
            $array =
                Excel::toArray(new TagihanImport, $fileExcel);

            for ($i = 3; $i < sizeof($array[0]); $i++) {
                $dataS[] = $array[0][$i][0];
            }
            $santri = santri::whereIn('nis', $dataS)->get();
        } else {
            $santri = santri::select('id')->get();
        }



        if ($this->periode == "spp") {
            $this->validate([
                'tempo' => 'numeric|min:1|max:29',
            ]);
            foreach ($santri as $data) {
                $santri_id = $data->id;
                for ($i = 0; $i <= $this->tahun['selisih']; $i++) {
                    $tempo = date('Y-m-d', strtotime("+$i month", strtotime($this->tahun['awal']['date'])));
                    $data = array(
                        'id' => Str::uuid(),
                        'jenis_tagihan_id' => $this->jenis,
                        'santri_id' => $santri_id,
                        'tempo' => $tempo,
                        'jumlah' => $this->biaya,
                    );

                    Tagihan::insert($data);
                }
            }
        } else {

            foreach ($santri as $data) {
                $santri_id = $data->id;

                $data = array(
                    'id' => Str::uuid(),
                    'jenis_tagihan_id' => $this->jenis,
                    'santri_id' => $santri_id,
                    'tempo' => $this->tempo,
                    'jumlah' => $this->biaya,
                );
                Tagihan::insert($data);
            }
        }

        $this->reset();
        session()->flash('message', 'tagihan berhasil ditambah');
    }
}
