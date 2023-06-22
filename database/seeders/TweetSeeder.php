<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Tweet;

class TweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach(range(1,10) as $value)
        {
            Tweet::create([
                'user_id' => random_int(1,20),
                'tweet' => $faker->realText($maxNbChars = 100, $indexSize = 2),

            ]);
        }
    }
}
