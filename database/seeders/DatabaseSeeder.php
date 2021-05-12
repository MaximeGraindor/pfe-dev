<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\BadgeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            GameSeeder::class,
            PublisherSeeder::class,
            SupportSeeder::class,
            PlateformeSeeder::class,
            GenreSeeder::class,
            ModeSeeder::class,
            RoleSeeder::class,
            GameUserSeeder::class,
            BadgeSeeder::class
        ]);
    }
}
