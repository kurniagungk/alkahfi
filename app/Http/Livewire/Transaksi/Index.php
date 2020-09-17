<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

use App\santri;

class Index extends Component
{

    public $nis;
    public $profil;
    public $find = false;
    public $data = false;


    protected $updatesQueryString = [
        'nis',
    ];
    protected $listeners = [];

    public function render()
    {
        return view('livewire.transaksi.index');
    }

    public function find()
    {


        $data = santri::where(function (Builder $query) {
            return $query->Where('nism', $this->nis)
                ->orWhere('nisn', $this->nis);
        });

        $user = Auth::user();


        if (!$user->hasRole('admin'))
            $data->where('sekolah_id', $user->sekolah_id);

        $this->profil = $data->first();
        $this->emit('find');

        if ($this->profil)
            $this->find = true;
        else {
            $this->find = false;
            $this->data = true;
        }
    }
}
