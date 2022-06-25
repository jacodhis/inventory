<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shop;

class shopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1;
        $data =10;
        for($i = 0 ;$i <$data; $i++){
            Shop::create([
                'name'=>'shop'.$count++,
                'description'=>"this is shop\'s descriptio ",
                'location'=> "location".$count++
            ]);
        }
        
    }
}
