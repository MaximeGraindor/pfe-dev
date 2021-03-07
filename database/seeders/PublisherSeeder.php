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
    }
}
