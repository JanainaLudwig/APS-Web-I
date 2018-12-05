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
        $categories = DB::table('categories')->pluck('id');

        for ($i = 0; $i < 10; $i++) {
            DB::table('recipes')->insert([
                'title' => $faker->text(10),
                'body' => $faker->paragraph(),
                'user_id' => $faker->randomElement($users),
                'yield' => '1 porção',
                'time' => '1 hora',
                'created_at' => $faker->dateTimeBetween('-2 years', 'now')
            ]);
        }

        $recipes = DB::table('recipes')->pluck('id');

        foreach ($recipes as $recipe) {
            for ($i = 0; $i < 2; $i++) {
                DB::table('category_recipe')->insert([
                   'category_id' => $faker->randomElement($categories),
                   'recipe_id' => $recipe
                ]);
            }
        }
    }
}
