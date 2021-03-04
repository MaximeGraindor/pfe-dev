<?php

namespace Database\Seeders;

use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::insert([
            'name' => 'Cyberpunk 2077',
            'slug' => 'cyberpunk-2077',
            'description' => 'Cyberpunk 2077 est un jeu de rôle futuriste et dystopique inspiré du jeu de rôle papier du même nom. Dans un monde devenu indissociable de la cybernétique, l\'indépendance des robots humanoïdes pose quelques problèmes...',
            'cover_path' => '/games/cyberpunk-2077-cover.jpg',
            'banner_path' => '/games/banner/cyberpunk-2077-banner.jpg',
            'release_date' => '2020/12/10',
            'publisher_id' => '1',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),

        ]);
    }
}
