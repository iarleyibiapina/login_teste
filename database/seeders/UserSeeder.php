<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Gera seeder para dois usuarios base
     */
    public function run(): void
    {
        //
        User::insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('secret'),
        ]);

        User::insert([
            'id' => 2,
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('secret'),
        ]);
    }
}
