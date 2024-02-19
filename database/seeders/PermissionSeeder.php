<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Criando papeis
     */
    public function run(): void
    {
        Permission::insert([
            'id' => 1,
            'name' => 'add_role',
            'description' => 'Adicionar um papel',
        ]);

        Permission::insert([
            'id' => 2,
            'name' => 'show_role',
            'description' => 'Ver os papeis',
        ]);
    }
}
