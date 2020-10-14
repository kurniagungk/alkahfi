<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


use App\Jenis_tagihan;
use App\Tagihan;
use App\Kelas;


class Tampil extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $jenisTagihan;
    public $search;
    public $page = 1;
    public $confirming;
    public $perpage = 10;
    public $select = [];
    public $selectKelas;
    public $hapus = false;

    protected $updatesQueryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function mount(Jenis_tagihan $id)
    {
        $this->jenisTagihan = $id;
    }

    public function updatingperpage()
    {
        $this->resetPage();
    }

    public function updatingselectKelas()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {

        Tagihan::destroy($id);
        session()->flash('success', 'Data Tagihan successfully deleted.');
    }

    public function hapusPilihan()
    {
        $this->hapus = true;
    }

    public function hapus()
    {
        $deletedRows = Tagihan::whereIn('id', $this->select)->delete();
        $this->reset('hapus', 'select');
    }

    public function render()
    {
        $user = Auth::user();

        $selectKelas = $this->selectKelas;

        $santri = Tagihan::where('jenis_tagihan_id', $this->jenisTagihan->id)
            ->with('santri')
            ->with('kelas')
            ->whereHas('santri', function (Builder $query) use ($user, $selectKelas) {

                if ($selectKelas > 0)
                    $query->where('kelas_id', $selectKelas);

                if (!$user->hasRole('admin'))
                    $query->where('sekolah_id', $user->sekolah_id);

                $query->where(function (Builder $query) {
                    $query->Where('nama', 'like', '%' . $this->search . '%')
                        ->orWhere('nisn', 'like', '%' . $this->search . '%')
                        ->orWhere('nism', 'like', '%' . $this->search . '%');
                });
            })
            ->whereDoesntHave('bayar')->paginate($this->perpage);




        if (!$user->hasRole('admin')) {
            $data->where('sekolah_id', $user->sekolah_id);
            $kelas = Kelas::where('sekolah_id', $user->sekolah_id)->get();
        } else {
            $kelas = Kelas::get();
        }



        return view('livewire.tagihan.tampil', compact('santri', 'kelas'))
            ->extends('dashboard.base')
            ->section('content');
    }
}
