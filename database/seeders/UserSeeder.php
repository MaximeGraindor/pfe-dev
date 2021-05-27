<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'pseudo' => 'ZeDOver',
            'picture' => 'user-picture-default.jpg',
            'email' => 'maxime.graindor@hotmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::insert([
            'pseudo' => 'Jean',
            'picture' => 'user-picture-default.jpg',
            'email' => 'jean@hotmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::insert([
            'pseudo' => 'Vannaria',
            'picture' => 'user-picture-default.jpg',
            'email' => 'vannaria@hotmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::insert([
            'pseudo' => 'JhonDoe',
            'picture' => 'user-picture-default.jpg',
            'email' => 'jhondoe@hotmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::insert([
            'pseudo' => 'Pauline',
            'picture' => 'user-picture-default.jpg',
            'email' => 'pauline@hotmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::insert([
            'pseudo' => 'Maxime',
            'picture' => 'user-picture-default.jpg',
            'email' => 'maxime@hotmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::insert([
            'pseudo' => 'Utilisateur',
            'picture' => 'user-picture-default.jpg',
            'email' => 'utilisateur@hotmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::insert([
            'pseudo' => 'ProfilX',
            'picture' => 'user-picture-default.jpg',
            'email' => 'profilx@hotmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::insert([
            'pseudo' => 'MgGraindor',
            'picture' => 'user-picture-default.jpg',
            'email' => 'mggraindor@hotmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::insert([
            'pseudo' => 'User',
            'picture' => 'user-picture-default.jpg',
            'email' => 'user@hotmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


    }
}
