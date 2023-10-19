<?php

namespace App\Http\Livewire\SuperAdmin\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\SendStaffMail;
use App\Mail\SaffMailNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
class SendMailtoUser extends Component
{
    public $mail_body;
    public $subject;
    public $staff_id;

    public function updated($fields){
        $this->validateOnly($fields,[
            'mail_body' => ['required','string','max:6000'],
            'subject' => ['required','string']
        ]);
    }

    public function sendMail(){
        $this->validate([
            'mail_body' => ['required','string'],
            'subject' => ['required','string']
        ]);

        $mailContent = SendStaffMail::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $this->staff_id,
            'subject' => $this->subject,
            'mail_body' => $this->mail_body,
        ]);

        $staff = User::find($this->staff_id);

        Mail::to($staff)->queue(new SaffMailNotification($mailContent));
        activityLog('Email Notification',Auth::user()->surname.' '.Auth::user()->othernames.' sent a mail to  '.$staff->surname.' '.$staff->othernames);
        $this->dispatchBrowserEvent('feedback',['feedback'=>'Mail successfully sent to '.$staff->surname.' '.$staff->othernames]);
        $this->reset(['mail_body','subject']);

    }

    public function mount($id){
        $this->staff_id = $id;
    }

    public function render()
    {
        $staff = User::find($this->staff_id);
        return view('livewire.super-admin.users.send-mailto-user',compact('staff'));
    }
}
