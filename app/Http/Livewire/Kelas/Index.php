<?php

namespace App\Http\Livewire\Kelas;

use Livewire\Component;
use App\Kelas;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

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
    public function destroy($id)
    {

        if ($id) {
            $data =  Kelas::Where('id', $id)->delete();
            session()->flash('message', 'berhasil di hapus');
        }
    }
    public function edit($id)
    {
        return redirect()->to(route('tahun.edit', $id));
    }
}
