<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class TestDbTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('test_db_tables')->insert([
                'name' => $faker->name,
                'birthdate' => $faker->dateTime,
                'amount' => $faker->randomNumber(2),

            ]);
        }
    }
}
