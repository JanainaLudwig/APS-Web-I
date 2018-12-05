<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');

        for ($i = 0; $i < 15; $i++) {
            DB::table('categories')->insert([
                'name' => $faker->text(12)
            ]);
        }

    }
}
