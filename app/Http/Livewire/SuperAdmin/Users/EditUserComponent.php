<?php

namespace App\Http\Livewire\SuperAdmin\Users;

use Livewire\Component;
use App\Models\User;

class EditUserComponent extends Component
{
    public $staff_id;
    public $designation;
    public $surname;
    public $othernames;
    public $phoneno;
    public $email;
    public $password;
    public $address;
    public $user_type;
    public $message = [
        'surname.required'=>'Please Enter staff Surname',
        'othernames.required'=>'Please Enter staff Othernames',
        'phoneno.required'=>'Please Enter staff Phone Number',
        'address.required'=>'Please Enter staff Home Address',
        'email.required'=>'Please Enter staff Email Address',
        'phoneno.unique'=>'Sorry! Phone Number Already Exist',
        'email.unique'=>'Sorry! Email Already Exist',
        'user_type.required'=>'Please Select Staff Role',
        'salary.required'=>'Please Enter Staff Sallary',
        'branch.required'=>'Please Staff branch',
        'branch.string'=>'Please Staff branch',
       ];//end customer message

    public function mount($id){
        $this->staff_id = $id;
        $staff = User::find($id);

        $this->designation = $staff->designation;
        $this->surname = $staff->surname;
        $this->othernames = $staff->othernames;
        $this->email = $staff->email;
        $this->user_type = $staff->user_type;
    }

    public function updated($field){
        $this->validateOnly($field,[
            'designation' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'othernames' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255','unique:users,email,'.$this->staff_id],
            'phoneno' => ['required', 'string', 'max:11','unique:users,phoneno,'.$this->staff_id],
            'user_type' => ['required', 'string', 'max:255'],
          ], $this->message);
    }
public function updateStaff(){
       //user input validation
       $this->validate([
        'designation' => ['required', 'string', 'max:255'],
         'surname' => ['required', 'string', 'max:255'],
         'othernames' => ['required', 'string', 'max:255'],
         'email' => ['required', 'email', 'max:255','unique:users,email,'.$this->staff_id],
         'phoneno' => ['required', 'string', 'max:11','unique:users,phoneno,'.$this->staff_id],
         'user_type' => ['required', 'string', 'max:255'],
       ], $this->message);

       $user = User::find($this->staff_id);

       $user->update([
         'designation' => $this->designation,
         'surname' => $this->surname,
         'othernames' => $this->othernames,
         'email' => $this->email,
         'user_type' => $this->user_type,
         ]);

         activityLog('Staff Modification','staff  '.$this->surname. ' '.$this->othernames .' was modificted');
         $this->dispatchBrowserEvent('feedback',['feedback'=>'Staff Successfully Modified']);
         return redirect()->route('users.index');
    }

    public function render()
    {
        $branches = Branch::all();
        $departments = Department::all();
        return view('livewire.super-admin.users.edit-user-component',compact('branches','departments'));
    }
}
