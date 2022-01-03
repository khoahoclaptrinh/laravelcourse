<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;

use Illuminate\Support\Str;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Factory::create();
        $n = 200;
        for ($i = 0; $i <=$n ;$i++) {
            DB::table('posts')->insert([
                'name' => $faker->name,
                'description' =>'<p>'.$faker->paragraph($nbSentences = 10, $variableNbSentences = true).'</p>'
            ]);
        }


    }
}
