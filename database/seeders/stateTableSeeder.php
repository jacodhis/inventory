<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class stateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\State::create([
            'status'=> 'active',
        ]);
        \App\Models\State::create([
            'status'=> 'inactive',
        ]);


    }
}
