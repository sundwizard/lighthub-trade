<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\ResetPasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SetPasswordComponent extends Component
{
    public $password;
    public $password_confirmation;
    public $email;
    public $token;

    public $message = [
        'password.required' => "Please your desired password",
        'password_confirmation.required' => "Please confirm your password",
        'same.confirmed' => "password mismach",
    ];

    public function mount($email, $token){
        $this->email = $email;
        $this->token = $token;
    }

    //real time validation function
    public function updated($fields){
        $this->validateOnly($fields,[
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'string', 'min:8','same:password'],
        ],$this->message);
    }

    //verify account and set password
    public function setPassword(){
        $this->validate([
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'string', 'min:8','same:password'],
        ],$this->message);

        User::where('email',$this->email)->first()->update([
            'password' => Hash::make($this->password),
            'email_verified_at' => now(),
            'status' => 'Active',
        ]);



        //delete verificaiton token
        ResetPasswordMail::where('email',$this->email)->delete();

        return redirect()->route('login')->with('success-feedback','Verification successful! Please login to continue.');
    }//end verify account

    public function render()
    {
        $checkToken = ResetPasswordMail::where('email',$this->email)->first();
        return view('livewire.auth.set-password-component',compact('checkToken'))->layout('layouts.guest');
    }
}
