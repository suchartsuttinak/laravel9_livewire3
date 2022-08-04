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
    public $deleteId;
    public $updateId;
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


    public function resetForm(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    //Export & Import Excel
    public function exportExcel() {
        $users = User::all();
        // (new FastExcel($users))->export( uniqid().'.xlsx');
        return response()->streamDownload(function() use($users){
             return (new FastExcel($users))->export('php://output', function($user) {
            return [
                'name' => $user->name,
                'email' => $user->email,
                'Creatd At' => $user->created_at->format('y-m-d H:i:s')

            ];
             });
        },
        sprintf('user-%s-%s.xlsx', date('y-m-d'), uniqid())
    );

    }
//Export Excel
// -------------------------------------------------------------------------------------------

//Export & Import Excel

public function importExcel() {
    try {
        (new FastExcel)->import('users-import.xlsx', function ($line) {
            return User::create([
                'name' => $line['name'],
                'email' => $line['email'],
                'password' => Hash::make($line['password'])
            ]);
        });
        session()->flash('message', 'นำเข้าข้อมูลผู้ใช้สำเร็จ');
    } catch (\Throwable $th) {
        //throw $th;
        session()->flash('message', 'เกิดข้อผิดพลาดในการ import');
    }
}
    public function confirmDelete($id){
        $this->deleteId = $id;
    }
    public function delete(){
        User::find($this->deleteId)->delete();
        session()->flash('message', 'ลบข้อมูลเรียบร้อย');
    }

    public function confirmEdit($id){
        $this->updateId = $id;
        $this->resetForm();
        $user = User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
    }
    public function update(){
        User::find($this->updateId)->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        $this->resetForm();
        session()->flash('message', 'แก้ไขข้อมูลเรียบร้อย');
    }

}
