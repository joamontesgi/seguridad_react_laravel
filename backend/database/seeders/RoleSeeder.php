<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    
    public function run()
    {
        Role::insert([
            [
                'name'       => 'Administrador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Mantenimiento',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Sistemas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Recursos humanos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
