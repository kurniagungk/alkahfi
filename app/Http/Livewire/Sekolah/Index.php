<?php

namespace App\Http\Livewire\Sekolah;

use Livewire\{Component, WithPagination};
use Illuminate\Support\Facades\Auth;
use App\Sekolah;


class Index extends Component
{
    use WithPagination;
    public $confirming;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        $user = Auth::user();

        if (!$user->hasRole('admin')) {
            $sekolah = Sekolah::where('id', $user->sekolah_id)->latest()
                ->paginate(10);
        } else {
            $sekolah = Sekolah::latest()
                ->paginate(10);
        }

        return view(
            'livewire.sekolah.index',
            [
                'sekolah' => $sekolah
            ]
        )->extends('dashboard.base')
            ->section('content');
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
