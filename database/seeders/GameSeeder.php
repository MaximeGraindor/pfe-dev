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
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),

        ]);

        Game::insert([
            'name' => 'Watch dogs Légion',
            'slug' => 'watch-dogs-legion',
            'description' => 'Watch Dogs Legion, troisième épisode de la série d\'Ubisoft, vous plonge dans le Londres post-Brexit ultra-connecté et surveillé. Vous aurez la possibilité d\'hacker n\'importe qui, mais aussi d\'en prendre possession. Chaque mort est permanente, d\'où l\'utilité de prendre possession des PNJ',
            'cover_path' => '/games/cover/watch-dogs-legion-cover.jpg',
            'banner_path' => '/games/banner/watch-dogs-legion-banner.jpg',
            'release_date' => '2020/10/29',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);

        Game::insert([
            'name' => 'Dark souls 3',
            'slug' => 'dark-souls-3',
            'description' => 'Développé par From Software, Dark Souls 3 est un action RPG particulièrement exigeant. L\'environnement, très peu accueillant, ravira les amateurs de challenges corsés. Vous y combattrez de gigantesques ennemis, qui ne feront qu\'une bouchée de vous.',
            'cover_path' => '/games/cover/dark-souls-3-cover.jpg',
            'banner_path' => '/games/banner/dark-souls-3-banner.jpg',
            'release_date' => '2016/04/12',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);

        Game::insert([
            'name' => 'Grand Theft Auto V',
            'slug' => 'grand-theft-auto-5',
            'description' => 'Jeu d\'action-aventure en monde ouvert, Grand Theft Auto (GTA) V vous place dans la peau de trois personnages inédits : Michael, Trevor et Franklin. Ces derniers ont élu domicile à Los Santos, ville de la région de San Andreas. Braquages et missions font partie du quotidien du joueur qui pourra également cohabiter avec 15 autres utilisateurs dans cet univers persistant s\'il joue sur PS3/Xbox 360 ou 29 s\'il joue sur PS4/Xbox One/PC',
            'cover_path' => '/games/cover/grand-theft-auto-5-cover.jpg',
            'banner_path' => '/games/banner/grand-theft-auto-5-banner.jpg',
            'release_date' => '2013/09/17',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);

        Game::insert([
            'name' => 'The witche 3 : Wild Hunt',
            'slug' => 'the-witcher-3-wild-hunt',
            'description' => 'Action-RPG en open world pour PC, The Witcher 3 : Wild Hunt est le troisième opus de la série de jeux éponyme. Le joueur y retrouve le personnage de Geralt de Riv pour découvrir la fin de son histoire mouvementée.',
            'cover_path' => '/games/cover/the-witcher-3-wild-hunt-cover.jpg',
            'banner_path' => '/games/banner/the-witcher-3-wild-hunt-banner.jpg',
            'release_date' => '2015/05/19',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);

        Game::insert([
            'name' => 'Portal 2',
            'slug' => 'portal-2',
            'description' => 'Portal 2 est un jeu de réflexion sur PC. Celui-ci met en scène l\'héroïne du premier volet qui doit une fois de plus échapper à GLaDOS dans le complexe d\'Aperture Science. En utilisant le Portal Gun, les joueurs seront confrontés à de nouveaux pièges et devront faire bon usage d\'une peinture capable de modifier les caractéristiques des différentes surfaces rencontrées. La nouveauté reste la possibilité d\'y jouer à 2',
            'cover_path' => '/games/cover/portal-2-cover.jpg',
            'banner_path' => '/games/banner/portal-2-banner.jpg',
            'release_date' => '2011/04/19',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);

        Game::insert([
            'name' => 'Dead Space 2',
            'slug' => 'dead-space-2',
            'description' => 'Le jeu d\'action Dead Space 2 sur PC remet en scène Isaac, le héros du premier opus, 3 ans après qu\'il se soit échappé de l\'Ishimura, un vaisseau spatial abandonné. Cette fois, Isaac est envoyé sur The Sprawl, une gigantesque station dévastée. Dans cette suite, les décors sont plus variés, de nouvelles armes apparaissent, de nouvelles énigmes et l\'angoisse sont toujours au rendez-vous.',
            'cover_path' => '/games/cover/dead-space-2-cover.jpg',
            'banner_path' => '/games/banner/dead-space-2-banner.jpg',
            'release_date' => '2011/01/27',
            'created_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
    }
}
