<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;
use Livewire\WithPagination;
use App\User;


class IndexUser extends Component
{

    use WithPagination;
    public $confirming;

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        if ($id) {
            $data =  User::Where('id', $id)->delete();
            session()->flash('message', 'berhasil di hapus');
        }
    }


    public function render()
    {
        $user = User::with('roles')->latest()
            ->paginate(10);
        return view('livewire.setting.index-user', compact('user'));
    }
}
