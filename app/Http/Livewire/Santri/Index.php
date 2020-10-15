<?php

namespace App\Http\Livewire\Santri;

use Livewire\{Component, WithPagination};
use App\{santri, Kelas};
use Illuminate\{Database\Eloquent\Builder, Support\Facades\Auth};


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $sortField = 'nama';
    public $sortAsc = true;
    public $search;
    public $page = 1;
    public $perpage = 10;
    public $confirming;
    public $selectKelas;


    protected $queryString  = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingselectKelas()
    {
        $this->resetPage();
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        santri::destroy($id);
        session()->flash('success', 'Data Santri successfully deleted.');
    }


    public function render()
    {
        $user = Auth::user();



        $data =
            santri::with('kelas')
            ->with('provinsi')
            ->with('kabupaten')
            ->with('kecamatan')
            ->with('desa');


        if (!$user->hasRole('admin')) {
            $data->where('sekolah_id', $user->sekolah_id);
            $kelas = Kelas::where('sekolah_id', $user->sekolah_id)->get();
        } else {
            $kelas = Kelas::get();
        }

        if ($this->selectKelas > 0)
            $data->where('kelas_id', $this->selectKelas);




        $santri = $data
            ->where(function (Builder $query) {
                $query->Where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('nisn', 'like', '%' . $this->search . '%')
                    ->orWhere('nism', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->latest()
            ->paginate($this->perpage);


        return view('livewire.santri.index', compact('santri', 'kelas'));
    }
}
