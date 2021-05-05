<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::insert([
            'name' => 'Action',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Genre::insert([
            'name' => 'Aventeure',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Genre::insert([
            'name' => 'Action-aventure',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Genre::insert([
            'name' => 'Jeu de rôle',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Genre::insert([
            'name' => 'Réflexion',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Genre::insert([
            'name' => 'Simulation',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Genre::insert([
            'name' => 'Stratégie',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Genre::insert([
            'name' => 'Sport',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        Genre::insert([
            'name' => 'Course',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
    }
}
