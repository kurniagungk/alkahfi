<?php

namespace App\Http\Livewire\Tagihan;

use Livewire\{Component, WithPagination};
use App\Jenis_tagihan;
use Illuminate\Support\Facades\Auth;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $confirming;


    public function render()
    {

        $user = Auth::user();
        $data = Jenis_tagihan::with('tahun');

        if (!$user->hasRole('admin'))
            $data->Where('sekolah_id', $user->sekolah_id)
                ->orWhere('sekolah_id', null);


        $DaftarTagihan = $data->latest()->paginate(10);

        return view('livewire.tagihan.index', compact('DaftarTagihan'));
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
