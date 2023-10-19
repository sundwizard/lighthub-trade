<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ProfileComponent extends Component
{
    public function render()
    {
        $staff = User::find(Auth::user()->id);
        return view('livewire.profile.profile-component',compact('staff'));
    }
}
