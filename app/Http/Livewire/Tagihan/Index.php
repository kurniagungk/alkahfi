<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\Component;
use App\DaftarTagihan;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {

        return view('livewire.tagihan.index', [
            'DaftarTagihan' => DaftarTagihan::latest()->paginate(10)
        ]);
    }
    public function destroy($id)
    {

        if ($id) {
            $data =  DaftarTagihan::find($id);
            $data->delete();
            session()->flash('message', 'berhasil di hapus');
        }
    }
}
