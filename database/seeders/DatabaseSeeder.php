<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Sagar Gurung',
            'username' => 'sgrgug',
            'email' => 'sgrgug@gmail.com',
            'password' => Hash::make('1'),
        ]);

        $this->call([
            UserSeeder::class,
            TweetSeeder::class,
        ]);

        \App\Models\Comment::factory(100)->create();

    }
}
