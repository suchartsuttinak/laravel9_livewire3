<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use PhpParser\Node\Stmt\TryCatch;
use Rap2hpoutre\FastExcel\FastExcel;

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
        $users = User::orderBy('id', 'desc')->paginate(9);
        return view('livewire.user.user-index' , [
            'users' => $users
        ]);
    }
 //vaidation

//  realtime validation
    public function updated($propertyName)
{
    $this->validateOnly($propertyName);
}
//  realtime validation




//vaidation
    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required'
        ];
    }
 // custom vaidation message
 protected $messages = [
    'name.required' => 'กรุณากรอกชื่อ',
    'email.required' => 'อีเมลห้ามว่าง',
    'email.email' => 'รูปแบบอีเมล์ไม่ถูกต้อง',
    'email.unique' => 'มีผู้ใช้งานอีเมล์นี้แล้ว กรุณาลองใหม่',
    'password.required' => 'รหัสผ่านห้ามว่าง',
];

//vaidation


    public function store() {
        $this->validate();//check varidation

        try {

            $this->user::create([
                'name' =>$this->name,
                'email' =>$this->email,
                'password' => Hash::make($this->password),
            ]);
            $this->resetForm();
            session()->flash('message', 'เพิ่มข้อมูลสำเร็จ');
           } catch (\Throwable $th) {
            session()->flash('message', 'เกิดข้อผิดพลาด');
    }
}

//Export & Import Excel
    public function resetForm(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function exportExcel() {
        $users = User::all();
        // Export all users
        (new FastExcel($users))->export( uniqid().'.xlsx');
        session()->flash('message', 'ส่งออกสำเร็จ');
    }

    public function importExcel() {

    }
}
