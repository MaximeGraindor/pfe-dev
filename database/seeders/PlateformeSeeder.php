<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Plateforme;
use Illuminate\Database\Seeder;

class PlateformeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plateforme::insert([
            'name' => 'Steam',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Plateforme::insert([
            'name' => 'Uplay',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Plateforme::insert([
            'name' => 'Origin',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Plateforme::insert([
            'name' => 'Epic Games',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Plateforme::insert([
            'name' => 'Gog',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Plateforme::insert([
            'name' => 'battle.net',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
    }
}
