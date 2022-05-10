<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = "10";
        $count = 1;
        for($i=0;$i<$products;$i++){
            \App\Models\Product::create([
                'title'=>"product".$count++,
                'sku_no'=>md5(mt_rand(10,30)).$count++,
                'category_id'=>$count++,
                'entry'=>$products,
                'p_price'=>80,
                's_price'=>100,
                'property_id'=>$count++
            ]);
        }
    }
}
