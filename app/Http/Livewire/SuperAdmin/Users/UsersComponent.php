<?php

namespace App\Http\Livewire\SuperAdmin\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\ResetPasswordMail;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
class UsersComponent extends Component
{
    protected $listeners = ['delete-confirmed'=>'deleteStaff','disable-confirmed'=>'disableUser',
                            'enable-confirmed'=>'enableUser','reset-confirmed'=>'resetPassword']; // listen to comfirmatio delete and call delete branch function

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $actionId;
    public $paginate;

    public $searchTerm = null;
    public $searchBy = null;

    public function mount(){
        $this->searchBy = 'surname'; //set default search criterial
        $this->paginate = 10; //set default search criterial
    }

    //get branch records
    public function getStaffRecord(){
        $branches = User::query()
        ->where($this->searchBy, 'like', '%'.$this->searchTerm.'%')
        ->orWhere('othernames', 'like', '%'.$this->searchTerm.'%')
        ->orWhere('email', 'like', '%'.$this->searchTerm.'%')
        ->latest()->paginate($this->paginate);
        return $branches;
    }

    //set branch id when the delete botton is clicked
    public function setActionId($actionId){
        $this->actionId = $actionId;
    }

    //delete branch function to delete branch
    public function deleteStaff(){
        $staff= User::find($this->actionId);
        activityLog('Staff Deleted',$staff->surname.' '.$staff->othernames.' was deleted');
        $staff->delete();
        $this->dispatchBrowserEvent('feedback', ['feedback' => "Staff Successfully Deleted"]);
    }

    //disable staff
    public function disableUser(){
        $staff= User::find($this->actionId);
        activityLog('Staff Disable',$staff->surname.' '.$staff->othernames.' was disabled ');
        $staff->update(['status' => 'Disabled']);
        $this->dispatchBrowserEvent('feedback', ['feedback' => "Staff Successfully Disabled"]);
    }

    //enable staff
    public function enableUser(){
        $staff= User::find($this->actionId);
        activityLog('Staff Enabled',$staff->surname.' '.$staff->othernames.' was enabled ');
        $staff->update(['status' => 'Active']);
        $this->dispatchBrowserEvent('feedback', ['feedback' => "Staff Successfully Enabled"]);
    }

    public function setPagination($pagination){
        $this->paginate = $pagination;
    }

    public function render()
    {
        $staffs = $this->getStaffRecord();
        return view('livewire.super-admin.users.users-component',compact('staffs'));
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
