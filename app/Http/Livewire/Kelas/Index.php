<?php

namespace App\Http\Livewire\Kelas;

use Livewire\{Component, WithPagination};
use Illuminate\Support\Facades\Auth;

use App\Kelas;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $confirming;


    public function render()
    {
        $user = Auth::user();

        if (!$user->hasRole('admin')) {
            $kelas = Kelas::with('sekolah')->where('sekolah_id', $user->sekolah_id)->latest()
                ->paginate(10);
        } else {
            $kelas = Kelas::with('sekolah')->latest()
                ->paginate(10);
        }

        return view(
            'livewire.kelas.index',
            [
                'kelas' => $kelas
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
