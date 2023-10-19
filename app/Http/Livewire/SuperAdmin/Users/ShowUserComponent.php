<?php

namespace App\Http\Livewire\SuperAdmin\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\ResetPasswordMail;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;

class ShowUserComponent extends Component
{
    public $staff_id;
    public $actionId;

    protected $listeners = ['reset-confirmed'=>'resetPassword']; // listen to comfirmatio delete and call delete branch function


    public function mount($id){
        $this->staff_id = $id;
    }

    public function render()
    {
        $staff = User::find($this->staff_id);
        return view('livewire.super-admin.users.show-user-component',compact('staff'));
    }

    public function setActionId($actionId){
        $this->actionId = $actionId;
    }

    public function resetPassword(){
        $staff = User::find($this->actionId);

        $otp_code = ResetPasswordMail::create([
            'email' => $staff->email,
            'token' => $token = Str::random(60),
            'otp' => $otp = mt_rand(2,1000000),
        ]);

        $url = url('set-password/'.$staff->email.'/'.$token);
        Mail::to($staff)->queue(new ResetPassword($staff,$url));
        activityLog('Staff Password Reset',$staff->surname.' '.$staff->othernames.' password was reset ');
        $this->dispatchBrowserEvent('feedback', ['feedback' => "Password Reset Mail successfully sent to staff registered email"]);

    }
}
