<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;
use Illuminate\{Support\Facades\DB, Validation\Rule};

use App\{Sekolah, User};

class Useredit extends Component
{
    public $userId;
    public $name;
    public $email;
    public $pasword;
    public $rePasword;
    public $roleId;
    public $sekolahId;

    public function mount(User $id)
    {

        $this->userId = $id->id;
        $this->name = $id->name;
        $this->email = $id->email;
        $this->roleId = $id->menuroles;
        $this->sekolahId = $id->sekolah_id;
    }

    public function edit()
    {


        $this->validate([
            'email' => ['required', Rule::unique('users')->ignore($this->userId)],
            'name' => 'required|min:6',
            'pasword' => 'required|min:6',
            'rePasword' => 'required|same:pasword',
            'roleId' => 'required'
        ]);
        if ($this->roleId > 1)
            $this->validate([
                'sekolahId' => 'required'
            ]);

        $user = User::find($this->userId);
        $user->removeRole($user->menuroles);

        $update = User::where('id', $this->userId)
            ->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->pasword,
                'menuroles' => $this->roleId,
                'sekolah_id' => $this->sekolahId
            ]);
        $user->assignRole($this->roleId);

        session()->flash('message', 'User successfully Update.');
        return redirect()->to(route('setting.user'));
    }

    public function render()
    {

        $role = DB::table('roles')->get();
        $sekolah = Sekolah::get();

        $data = [
            'role' => $role,
            'sekolah' => $sekolah
        ];
        return view('livewire.setting.useredit', compact('data'));
    }
}
