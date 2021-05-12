<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Badge;
use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Badge::insert([
            'name' => 'Premier commentaire',
            'slug' => 'premier-commentaire',
            'img' => 'badge-comment.svg',
            'description' => 'Vous avez posté votre premier commentaire',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Badge::insert([
            'name' => 'Premier jeu ajouté',
            'slug' => 'premier-jeu',
            'img' => 'badge-game.svg',
            'description' => 'Vous avez ajouté votre premier jeu',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
