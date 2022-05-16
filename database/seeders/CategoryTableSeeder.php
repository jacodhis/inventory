<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        $categories = 50;
        $count = 1;
        for($i=0;$i<$categories;$i++){
            \App\Models\Category::create([
                'name'=>"category".$count++,
                'description'=>$faker->sentence,
                
            ]);
        }
    }
}
