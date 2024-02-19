<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Seeder para gerar papeis
     */
    public function run(): void
    {
        Role::insert([
            'id' => 1,
            'name' => 'admin',
            'description' => 'Perfil de administrador',
        ]);

        Role::insert([
            'id' => 2,
            'name' => 'user',
            'description' => 'Perfil de usuário comum',
        ]);
    }
}
