<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Atribui permissoes aos papeis
     */
    public function run(): void
    {
        // atribuindo dois papeis a esta permissao (adicionar e visualizar)
        //ADMIN - add_role(1) e show_role(2)
        Role::find(1)->permissions()->attach([1, 2]);

        // atribuinto um papel a esta permissao (visualizar)
        //user - show_role(2)
        Role::find(2)->permissions()->attach(2);
    }
}
