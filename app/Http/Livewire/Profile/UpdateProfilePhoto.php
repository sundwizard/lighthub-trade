<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\User;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateProfilePhoto extends Component
{

    use WithFileUploads;
    public $photo;

    public $message = [
        'photo.required' => "Please select your passport photograph",
        'photo.required' => "photo must be of type jpg, or png",
        'photo.image' => "photo must be an image",
        'photo.dimensions' => "photo must have a minimum of 230 width and 250 height",
    ];

    public function updated($fields){
        $this->validateOnly($fields,[
            'photo' => ['required','image', 'dimensions:min_width=225,min_height=250', 'mimes:jpg,png,jpeg','max:100'],
        ],$this->message);
    }

    public function uploadProfilePhoto(){
        $this->validate([
            'photo' => ['required','image', 'dimensions:min_width=225,min_height=250', 'mimes:jpg,png','max:200'],
        ]);

        if($this->photo!=null){
            $photoName = Carbon::now()->timestamp. '.' . $this->photo->getClientOriginalName();//generate name for image
            $this->photo->storeAs('photo',$photoName);
          }else{
            $photoName = $this->profile_photo_path;
          }

        $user = User::find(Auth::user()->id);
        //delele old photo

        if($user->profile_photo_path!='user.png'){
            unlink('assets/photo/'.$user->profile_photo_path);
        }

        //update image link path
        $user->update([
            'profile_photo_path' => $photoName,
        ]);

        $this->dispatchBrowserEvent('feedback',['feedback'=>'Photo Successfully Upload']);
    }
    public function render()
    {
        return view('livewire.profile.update-profile-photo');
    }
}
