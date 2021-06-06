<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class ShowActivity extends Component
{

    public Activity $activity;

    public function like()
    {
        Auth::user()->like($this->activity);
    }

    public function render()
    {
        return view('livewire.show-activity');
    }
}
