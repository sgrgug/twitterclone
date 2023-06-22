<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,20) as $value)
        {
            User::create([
                'name' => $faker->name(),
                'username' => $faker->unique()->userName,
                'email' => $faker->unique()->safeEmail(),
                'password' => bcrypt($faker->password),
            ]);
        }
    }
}
