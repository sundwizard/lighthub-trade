<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use App\Models\ActivityLog;
use Livewire\WithPagination;
class StaffActivityLog extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $actionId;

    public $searchTerm = null;
    public $searchBy = null;

    public function mount(){
        $this->searchBy = 'action'; //set default search criterial
    }

    //get branch records
    public function getActivityLog(){
        $activities = ActivityLog::query()
        ->where($this->searchBy, 'like', '%'.$this->searchTerm.'%')->latest()->paginate(10);
        return $activities;
    }

    public function render()
    {
        $activities = $this->getActivityLog();
        return view('livewire.profile.staff-activity-log',compact('activities'));
    }
}
