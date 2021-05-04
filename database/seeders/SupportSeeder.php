<?php

namespace Database\Seeders;

use App\Models\Support;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Support::insert([
            'name' => 'PC',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Support::insert([
            'name' => 'Playsation',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Support::insert([
            'name' => 'Playsation 1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Support::insert([
            'name' => 'Playsation 2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Support::insert([
            'name' => 'Playsation 3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Support::insert([
            'name' => 'Xbox',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Support::insert([
            'name' => 'Xbox 360',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Support::insert([
            'name' => 'Xbox One',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Support::insert([
            'name' => 'WII',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
