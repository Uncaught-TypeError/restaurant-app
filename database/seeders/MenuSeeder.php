<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i=1; $i <= 5; $i++) {
            DB::table('menus')->insert([
                'name' => $faker->sentence(1),
                'description' => $faker->paragraph,
                'image' => $faker->imageUrl(400, 300, 'food', true),
                'price' => $faker->randomFloat(2, 100, 500),
            ]);
        }
    }
}
