<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $measure = ['Unidade(s)',
                    'Grama(s)',
                    'Miligrama(s)',
                    'Colher(es) de sopa',
                    'Colher(es) de chá',
                    'Xícara(s)',
                    'Copo(s)'
                    ];

        $faker = Faker::create('pt_BR');

        $recipes = DB::table('recipes')->pluck('id');

        foreach ($recipes as $recipe) {
            for ($i = 0; $i < 10; $i++) {
                DB::table('ingredients')->insert([
                    'quantity' => $faker->numberBetween(1, 15),
                    'measure' => $faker->randomElement($measure),
                    'recipe_id' => $recipe,
                    'name' => $faker->text(20)
                ]);
            }
        }
    }
}
