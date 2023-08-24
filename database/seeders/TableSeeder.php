<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i=1; $i <= 5; $i++) {
            DB::table('tables')->insert([
                'name' => $faker->sentence(1),
                'guest_number' => $faker->numberBetween(1, 20),
                'location' => $faker->randomElement(['front', 'inside', 'outside']),
            ]);
        }
    }
}
