<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Game;
use App\Models\Mode;
use App\Models\Support;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Calendar extends Component
{

    public $mode;
    public $support;
    public $month;
    public $year;

    public function render()
    {
        $modes = Mode::all();
        $supports = Support::all();
        $games = DB::table('games')
            ->whereMonth('release_date', $this->month)
            ->whereYear('release_date', $this->year)
            ->get();
        return view('livewire.calendar', compact('games', 'modes', 'supports'));
    }
}
