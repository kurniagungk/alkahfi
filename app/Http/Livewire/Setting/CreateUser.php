<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use App\Sekolah;
use App\User;


class CreateUser extends Component
{

    public $name;
    public $email;
    public $pasword;
    public $rePasword;
    public $roleId;
    public $sekolahId;


    public function store()
    {
        $this->validate([
            'name' => 'required|',
            'email' => 'required|email',
            'pasword' => 'required|min:6',
            'rePasword' => 'required|same:pasword',
            'roleId' => 'required'
        ]);
        if ($this->roleId > 1)
            $this->validate([
                'sekolahId' => 'required'
            ]);



        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => now(),
            'password' =>  Hash::make($this->pasword),
            'remember_token' => '123',
            'menuroles' => $this->roleId,
            'sekolah_id' => $this->sekolahId
        ]);

        $user->assignRole($this->roleId);
        $this->reset();
        session()->flash('message', 'User successfully created.');
    }


    public function render()
    {
        $role = DB::table('roles')->get();
        $sekolah = Sekolah::get();

        $data = [
            'role' => $role,
            'sekolah' => $sekolah
        ];

        return view('livewire.setting.create-user', compact('data'));
    }
}
