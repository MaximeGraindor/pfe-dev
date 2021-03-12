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
            'cover_path' => '/games/cover/cyberpunk-2077-cover.jpg',
            'banner_path' => '/games/banner/cyberpunk-2077-banner.jpg',
            'release_date' => '2020/12/10',
            'publisher_id' => '1',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),

        ]);

        Game::insert([
            'name' => 'Watch Dogs',
            'slug' => 'watch-dogs',
            'description' => 'Watch_Dogs est un jeu d\'action à la troisième personne sur PC. Dans un univers moderne et ouvert où tout est connecté à un système de contrôle central appartenant à des sociétés privées, le joueur incarne un groupe de hackeurs et d\'assassins capables d\'interférer avec les systèmes électroniques.',
            'cover_path' => '/games/cover/watch-dogs-cover.jpg',
            'banner_path' => '/games/banner/watch-dogs-banner.jpg',
            'release_date' => '2014/05/24',
            'publisher_id' => '2',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),

        ]);

        Game::insert([
            'name' => 'Assassins Creed Valhalla',
            'slug' => 'assassin-creed-valhalla',
            'description' => 'Assassin\'s Creed Valhalla est un RPG en monde ouvert se déroulant pendant l\'âge des vikings. Vous incarnez Eivor, un viking du sexe de votre choix qui a quitté la Norvège pour trouver la fortune et la gloire en Angleterre. Raids, construction et croissance de votre colonie, mais aussi personnalisation du héros ou de l\'héroïne sont au programme de cet épisode.',
            'cover_path' => '/games/cover/assassins-creed-valhalla-cover.jpg',
            'banner_path' => '/games/banner/assassins-creed-valhalla-banner.jpg',
            'release_date' => '2020/11/10',
            'publisher_id' => '2',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),

        ]);

        Game::insert([
            'name' => 'Hitman 3',
            'slug' => 'hitman-3',
            'description' => 'Hitman 3 est un jeu d\'infiltration dans lequel vous incarnez l\'agent 47. Dans ce troisième épisode de la nouvelle trilogie lancée en 2017, six lieux sont disponibles au lancement, mais il est possible de transférer les anciennes missions des deux premiers volets.',
            'cover_path' => '/games/cover/hitman-3-cover.jpg',
            'banner_path' => '/games/banner/hitman-3-banner.jpg',
            'release_date' => '2021/01/20',
            'publisher_id' => '2',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),

        ]);

        Game::insert([
            'name' => 'Watch dogs 2',
            'slug' => 'watch-dogs-2',
            'description' => 'Watch Dogs 2 est un jeu d\'aventure en monde ouvert faisant suite aux événements du premier épisode. Ce nouvel opus de la franchise nous entraîne au cœur de la ville de San Francisco dans la peau du nouveau héros Marcus Holloway, un jeune hacker surdoué victime des algorithmes prédictifs du ctOS 2.0 qui l’accusent d’un crime qu’il n’a pas commis. Dans sa quête de vérité, Marcus pourra hacker les infrastructures de la ville ainsi que les personnes qui sont connectées au réseau.',
            'cover_path' => '/games/cover/watch-dogs-2-cover.jpg',
            'banner_path' => '/games/banner/watch-dogs-2-banner.jpg',
            'release_date' => '2021/01/20',
            'publisher_id' => '2',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),

        ]);
        Game::insert([
            'name' => 'Cyberpunk 2077',
            'slug' => 'cyberpunk-2077',
            'description' => 'Cyberpunk 2077 est un jeu de rôle futuriste et dystopique inspiré du jeu de rôle papier du même nom. Dans un monde devenu indissociable de la cybernétique, l\'indépendance des robots humanoïdes pose quelques problèmes...',
            'cover_path' => '/games/cover/cyberpunk-2077-cover.jpg',
            'banner_path' => '/games/banner/cyberpunk-2077-banner.jpg',
            'release_date' => '2020/12/10',
            'publisher_id' => '1',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),

        ]);

        Game::insert([
            'name' => 'Watch Dogs',
            'slug' => 'watch-dogs',
            'description' => 'Watch_Dogs est un jeu d\'action à la troisième personne sur PC. Dans un univers moderne et ouvert où tout est connecté à un système de contrôle central appartenant à des sociétés privées, le joueur incarne un groupe de hackeurs et d\'assassins capables d\'interférer avec les systèmes électroniques.',
            'cover_path' => '/games/cover/watch-dogs-cover.jpg',
            'banner_path' => '/games/banner/watch-dogs-banner.jpg',
            'release_date' => '2014/05/24',
            'publisher_id' => '2',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),

        ]);

        Game::insert([
            'name' => 'Assassins Creed Valhalla',
            'slug' => 'assassin-creed-valhalla',
            'description' => 'Assassin\'s Creed Valhalla est un RPG en monde ouvert se déroulant pendant l\'âge des vikings. Vous incarnez Eivor, un viking du sexe de votre choix qui a quitté la Norvège pour trouver la fortune et la gloire en Angleterre. Raids, construction et croissance de votre colonie, mais aussi personnalisation du héros ou de l\'héroïne sont au programme de cet épisode.',
            'cover_path' => '/games/cover/assassins-creed-valhalla-cover.jpg',
            'banner_path' => '/games/banner/assassins-creed-valhalla-banner.jpg',
            'release_date' => '2020/11/10',
            'publisher_id' => '2',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),

        ]);

        Game::insert([
            'name' => 'Hitman 3',
            'slug' => 'hitman-3',
            'description' => 'Hitman 3 est un jeu d\'infiltration dans lequel vous incarnez l\'agent 47. Dans ce troisième épisode de la nouvelle trilogie lancée en 2017, six lieux sont disponibles au lancement, mais il est possible de transférer les anciennes missions des deux premiers volets.',
            'cover_path' => '/games/cover/hitman-3-cover.jpg',
            'banner_path' => '/games/banner/hitman-3-banner.jpg',
            'release_date' => '2021/01/20',
            'publisher_id' => '2',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),

        ]);

        Game::insert([
            'name' => 'Watch dogs 2',
            'slug' => 'watch-dogs-2',
            'description' => 'Watch Dogs 2 est un jeu d\'aventure en monde ouvert faisant suite aux événements du premier épisode. Ce nouvel opus de la franchise nous entraîne au cœur de la ville de San Francisco dans la peau du nouveau héros Marcus Holloway, un jeune hacker surdoué victime des algorithmes prédictifs du ctOS 2.0 qui l’accusent d’un crime qu’il n’a pas commis. Dans sa quête de vérité, Marcus pourra hacker les infrastructures de la ville ainsi que les personnes qui sont connectées au réseau.',
            'cover_path' => '/games/cover/watch-dogs-2-cover.jpg',
            'banner_path' => '/games/banner/watch-dogs-2-banner.jpg',
            'release_date' => '2021/01/20',
            'publisher_id' => '2',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),

        ]);
    }
}
