<?php

namespace App\Http\Livewire\TahunAjaran;

use Livewire\Component;
use App\TahunAjaran;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {

        return view('livewire.tahun-ajaran.index', [
            'tahun' => TahunAjaran::latest()

                ->paginate(10)
        ]);
    }
    public function destroy($id)
    {

        if ($id) {
            $data =  TahunAjaran::Where('id_tahun', $id)->delete();

            session()->flash('message', 'berhasil di hapus');
        }
    }
    public function edit($id)
    {
        return redirect()->to(route('tahun.edit', $id));
    }
}
