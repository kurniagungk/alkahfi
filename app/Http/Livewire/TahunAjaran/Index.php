<?php

namespace App\Http\Livewire\TahunAjaran;

use Livewire\Component;
use App\TahunAjaran;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $confirming;

    public function render()
    {

        return view('livewire.tahun-ajaran.index', [
            'tahun' => TahunAjaran::latest()

                ->paginate(10)
        ]);
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function status($id)
    {
        TahunAjaran::where('status', 'aktif')->update(['status' => 'tidak']);

        TahunAjaran::where('id', $id)->update(['status' => 'aktif']);
    }

    public function kill($id)
    {
        TahunAjaran::destroy($id);
        session()->flash('success', 'Tahun ajaran successfully deleted.');
    }


    public function edit($id)
    {
        return redirect()->to(route('tahun.edit', $id));
    }
}
