<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\{Component, WithFileUploads};

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TagihanImport;
use Illuminate\{Support\Facades\Auth, Database\Eloquent\Builder, Support\Str};

use App\{santri, Tagihan, Kelas, asrama, Jenis_tagihan};




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
    public $file;



    public function render()
    {
        return view('livewire.tagihan.tambah');
    }


    public function updatedperiode($value)
    {
        $this->reset('jenis');

        $user = Auth::user();
        $data = Jenis_tagihan::where('tipe', $value)->with('tahun');

        if (!$user->hasRole('admin'))
            $data->Where('sekolah_id', $user->sekolah_id)
                ->orWhere('sekolah_id', null);

        $this->dataJenis = $data->get();

        if (is_null($this->dataJenis)) {

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


        if ($value == 2) {


            $user = Auth::user();

            if (!$user->hasRole('admin')) {
                $kelas = Kelas::where('sekolah_id', $user->sekolah_id)->get();
            } else {
                $kelas = Kelas::get();
            }

            $this->DataSelect = $kelas;
            $this->emit('select');
        } elseif ($value == 3) {
            $this->DataSelect = asrama::latest()->get();
            $this->emit('select');
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
            $santri = santri::whereIn('kelas_id', $this->kelas)->get();
        } elseif ($this->select == 3) {
            $santri = santri::whereHas('asrama', function (Builder $query) {
                $query->whereIn('id', $this->kelas);
            })->get();
        } elseif ($this->select == 4) {
            $this->validate([
                'file' => 'required|mimes:xls,xlsx'
            ]);
            $fileExcel = $this->file->getRealPath();
            $array = Excel::toArray(new TagihanImport, $fileExcel);

            for ($i = 0; $i < sizeof($array[0]); $i++) {
                $dataS[] = $array[0][$i]['nis'];
            }
            $santri = santri::whereIn('nisn', $dataS)->get();
        } else {

            $user = Auth::user();
            $data = santri::select('id');
            if (!$user->hasRole('admin'))
                $data->where('sekolah_id', $user->sekolah_id);
            $santri = $data->get();
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

                Tagihan::firstOrCreate(
                    [
                        'jenis_tagihan_id' => $this->jenis,
                        'santri_id' => $santri_id,
                    ],
                    [
                        'id' => Str::uuid(),
                        'tempo' => $this->tempo,
                        'jumlah' => $this->biaya,
                    ]
                );
            }
        }

        $this->reset();
        session()->flash('message', 'tagihan berhasil ditambah');
    }
}
