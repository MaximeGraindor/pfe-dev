<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShowActivity extends Component
{

    public $activity;

    public function render()
    {
        return view('livewire.show-activity');
    }
}
