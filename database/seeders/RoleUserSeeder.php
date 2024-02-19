<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleUserSeeder extends Seeder
{
    /**
     * Gera papeis para usuarios
     */
    public function run(): void
    {
        //ADMINISTRADOR COM PAPEL DE ADMIN
        User::find(1)->roles()->attach(1);

        //user COM PAPEL DE user
        User::find(2)->roles()->attach(2);
    }
}
