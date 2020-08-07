<?php

namespace App\Http\Livewire\Santri;

use Livewire\Component;
use App\santri;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $sortField = 'nama';
    public $sortAsc = true;
    public $search;
    public $page = 1;
    public $perpage = 10;
    public $confirming;


    protected $updatesQueryString = [
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
        $santri =
            santri::with('asrama')
            ->where('nama', 'like', '%' . $this->search . '%')
            ->orWhere('nis', 'like', '%' . $this->search . '%')
            ->orWhere('alamat', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perpage);


        return view('livewire.santri.index', compact('santri'));
    }
}
