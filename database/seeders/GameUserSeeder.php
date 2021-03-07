<?php

namespace Database\Seeders;

use App\Models\GameUser;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class GameUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GameUser::insert([
            'relation' => 'envie',
            'user_id' => '1',
            'game_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
