<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
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
        $recipes = DB::table('recipes')->pluck('id');

        for ($i = 0; $i < 20; $i++) {
            DB::table('comments')->insert([
                'body' => $faker->paragraph(),
                'user_id' => $faker->randomElement($users),
                'recipe_id' => $faker->randomElement($recipes),
                'created_at' => $faker->dateTime()
            ]);
        }

    }
}
