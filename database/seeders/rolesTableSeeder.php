<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = ['admin','seller'];
       
            \App\Models\Role::create([
                'title'=>$users[0]
            ]);
            \App\Models\Role::create([
                'title'=>$users[1]
            ]);
        


    }
}
