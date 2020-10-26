<?php

namespace App\Http\Livewire\cektunggakan;

use Livewire\Component;
use Illuminate\{Support\Facades\Auth, Database\Eloquent\Builder};

use App\santri;

class Index extends Component
{

    public $nis;
    public $profil;
    public $find = false;
    public $data = false;



    protected $listeners = [];

    public function render()
    {
        return view('livewire.cektunggakan.index')
            ->extends('dashboard.kosong')
            ->section('content');
    }

    public function find()
    {


        if (!empty($this->nis)) {

            $this->reset('find');

            $data = santri::where(function (Builder $query) {
                return $query->Where('nism', $this->nis)
                    ->orWhere('nisn', $this->nis);
            });

            $user = Auth::user();


            if (!$user->hasRole('admin'))
                $data->where('sekolah_id', $user->sekolah_id);

            $this->profil = $data->first();
            // $this->emit('find');

            if ($this->profil)
                $this->find = true;
            else {
                $this->find = false;
                $this->data = true;
            }
            $this->reset('nis');
        }
    }
}
