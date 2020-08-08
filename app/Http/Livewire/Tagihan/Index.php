<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\Component;
use App\Jenis_tagihan;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    public $confirming;


    public function render()
    {

        return view('livewire.tagihan.index', [
            'DaftarTagihan' => Jenis_tagihan::latest()
                ->with('tahun')
                ->paginate(10),
        ]);
    }


    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        Jenis_tagihan::destroy($id);
        session()->flash('success', 'Tahun ajaran successfully deleted.');
    }



    public function edit($id)
    {
        return redirect()->to(route('tagihan.edit', $id));
    }
}
