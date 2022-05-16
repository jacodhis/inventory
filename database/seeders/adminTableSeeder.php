<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class adminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\User::create([
            'name'=>'Roy',
            'email'=>'roy@gmail.com',
            'password'=>Hash::make('password'),
            'role_id'=>1, //super admin
        ]);
        \App\Models\User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('password'),
            'role_id'=>2, //admin
        ]);
        \App\Models\User::create([
            'name'=>'retailer',
            'email'=>'retailer@gmail.com',
            'password'=>Hash::make('password'),
            'role_id'=>3, //retailer
        ]);
    }
}
