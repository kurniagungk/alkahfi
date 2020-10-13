<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


use App\Jenis_tagihan;
use App\Tagihan;


class Tampil extends Component
{

    use WithPagination;

    public $jenisTagihan;
    public $search;
    public $page = 1;
    public $confirming;
    public $perpage = 10;

    protected $updatesQueryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function mount(Jenis_tagihan $id)
    {
        $this->jenisTagihan = $id;
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



    public function render()
    {
        $user = Auth::user();

        $santri = Tagihan::where('jenis_tagihan_id', $this->jenisTagihan->id)
            ->with('santri')
            ->whereHas('santri', function (Builder $query) use ($user) {

                if (!$user->hasRole('admin'))
                    $query->where('sekolah_id', $user->sekolah_id);

                $query->where('nama', 'like', '%' . $this->search . '%');
                $query->orWhere('nism', 'like', '%' . $this->search . '%');
                $query->orWhere('nisn', 'like', '%' . $this->search . '%');
            })
            ->whereDoesntHave('bayar')
            ->paginate($this->perpage);


        return view('livewire.tagihan.tampil', compact('santri'))
        ->extends('dashboard.base')
        ->section('content');
    }
}
