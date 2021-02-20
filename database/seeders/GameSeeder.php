<?php

namespace Database\Seeders;

use App\Models\Game;
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
            'description' => 'Cyberpunk 2077 est un jeu de rôle futuriste et dystopique inspiré du jeu de rôle papier du même nom. Dans un monde devenu indissociable de la cybernétique, l\'indépendance des robots humanoïdes pose quelques problèmes...',
            'cover_path' => '/games/cyberpunk-2077-cover.jpg',
            'release_date' => '2020/12/10'
        ]);
    }
}
