<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::insert([
            'name' => 'CD projekt',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Publisher::insert([
            'name' => 'Ubisoft',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Publisher::insert([
            'name' => 'IO Interactive',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Publisher::insert([
            'name' => 'Rockstar Games',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Publisher::insert([
            'name' => 'Bandai Namco',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
