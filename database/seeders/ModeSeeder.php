<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Mode;
use Illuminate\Database\Seeder;

class ModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mode::insert([
            'name' => 'Solo',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Mode::insert([
            'name' => 'Multijoueur',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Mode::insert([
            'name' => 'Coopératif',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Mode::insert([
            'name' => 'Local',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
    }
}
