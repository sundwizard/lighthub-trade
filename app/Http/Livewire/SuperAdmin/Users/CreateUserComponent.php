<?php

namespace App\Http\Livewire\SuperAdmin\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\StaffProfileMail;
use Illuminate\Support\Facades\Hash;

class CreateUserComponent extends Component
{
        public $phoneno;
        public $surname;
        public $othernames;
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

        public function updated($field){
            $this->validateOnly($field,[
                'surname' => ['required', 'string', 'max:255'],
                'othernames' => ['required', 'string', 'max:255'],
                'phoneno' => ['required', 'string', 'max:11','min:11','unique:users'],
                'user_type' => ['required', 'string', 'max:255'],
              ], $this->message);
        }
    public function RegisterStaff(){

           //user input validation
           $this->validate([
             'surname' => ['required', 'string', 'max:255'],
             'othernames' => ['required', 'string', 'max:255'],
             'email' => ['required', 'email', 'max:255','unique:users'],
             'phoneno' => ['required', 'string', 'max:11','min:11','unique:users'],
             'user_type' => ['required', 'string', 'max:255'],
           ], $this->message);

           $user = User::create([
             'surname' => $this->surname,
             'othernames' => $this->othernames,
             'email' => $this->email,
             'phoneno' => $this->phoneno,
             'user_type' => $this->user_type,
             'status' => 'Active',
             'password' => Hash::make('Lighthub@2023'),
             ]);

             //sender staff notificaiton mail
             $this->sendMail($user);

             activityLog('New Staff Created','a new user  '.$this->surname. ' '.$this->othernames .' was created');
             $this->dispatchBrowserEvent('feedback',['feedback'=>'Staff Successfully created and login details sent to staff registered mail']);
             $this->reset();
        }

    public function sendMail($user){
        $url = url('login/');
        Mail::to($user)->queue(new StaffProfileMail($user,$url));
    }

    public function render()
    {
        return view('livewire.super-admin.users.create-user-component');
    }
}
