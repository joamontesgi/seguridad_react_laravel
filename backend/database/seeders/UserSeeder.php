<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::get('id');
        User::create([
            'name' => 'Pepito Perez',
            'role_id' => $role->random()->id,
            'email' => 'correo@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
