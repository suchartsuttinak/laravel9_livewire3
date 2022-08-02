<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $password;

    public User $user;

    public function mount(User $user){
        $this->user = $user;
    }

    public function render()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('livewire.user.user-index' , [
            'users' => $users
        ]);
    }
    public function store() {
        $this->user::create([
            'name' =>$this->name,
            'email' =>$this->email,
            'password' => Hash::make($this->password),
        ]);
    }
}
