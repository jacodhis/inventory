<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class propertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $properties = "300";
        $count = 1;
        for($i=0;$i<$properties;$i++){
            \App\Models\Property::create([
                'tax'=>"Property".$count++,
                'pad_vat'=>md5(mt_rand(10,30)).$count++,
                'rrp_plus_vat'=>$count++,
                'total'=>$properties,
                'pp_minus_vat'=>80,
            ]);
        }
    }
}
