<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(productTableSeeder::class);
        $this->call(stateTableSeeder::class);
        // $this->call(propertyTableSeeder::class);
        $this->call(rolesTableSeeder::class);
        $this->call(adminTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
