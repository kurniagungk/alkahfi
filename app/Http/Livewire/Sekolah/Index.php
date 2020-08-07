<?php

namespace App\Http\Livewire\Sekolah;

use Livewire\Component;
use App\Sekolah;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $confirming;

    public function render()
    {
        return view(
            'livewire.sekolah.index',
            [
                'sekolah' => Sekolah::latest()
                    ->paginate(10)
            ]
        );
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        if ($id) {
            $data =  Sekolah::Where('id', $id)->delete();
            session()->flash('message', 'berhasil di hapus');
        }
    }
}
