<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        if( env('APP_DEBUG') ){
            $this->call([
                RoleSeeder::class,
                UserSeeder::class,
            ]);
        }
    }
}
