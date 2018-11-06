<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');

        $users = DB::table('users')->pluck('id');

        for ($i = 0; $i < 10; $i++) {
            DB::table('recipes')->insert([
                'title' => $faker->text(10),
                'body' => $faker->paragraph(),
                'user_id' => $faker->randomElement($users),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now')
            ]);
        }

    }
}
