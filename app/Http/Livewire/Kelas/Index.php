<?php

namespace App\Http\Livewire\Kelas;

use Livewire\Component;
use App\Kelas;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $confirming;

    public function render()
    {
        return view(
            'livewire.kelas.index',
            [
                'kelas' => Kelas::latest()
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
            $data =  Kelas::Where('id', $id)->delete();
            session()->flash('message', 'berhasil di hapus');
        }
    }


    public function edit($id)
    {
        return redirect()->to(route('kelas.edit', $id));
    }
}
