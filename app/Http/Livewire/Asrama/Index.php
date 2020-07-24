<?php

namespace App\Http\Livewire\Asrama;

use Livewire\Component;
use Livewire\WithPagination;
use App\asrama;

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
        asrama::destroy($id);
        session()->flash('success', 'Test successfully deleted.');
    }


    public function render()
    {
        $asrama = asrama::where('nama', 'like', '%' . $this->search . '%')
            ->orWhere('kode', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perpage);

        return view('livewire.asrama.index', compact('asrama'));
    }
}
