<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "admin",
            "username" => "admin",
            "email" => "admin@posty.com",
            "password" => Hash::make("password")
        ]);
        User::factory(10)->create();
        Post::factory(30)->create();
    }
}
