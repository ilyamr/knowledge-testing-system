<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 5; $i++) {
            DB::table('topics')->insert([
                'title' => $faker->sentence(),
                'description' => $faker->text(),
            ]);
        }
    }
}
