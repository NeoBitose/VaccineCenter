<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\AdminModel;
USE Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        AdminModel::insert([
            'username' => "effendi_ghazali",
            'password' => Hash::make('12345123'),
            'first_name' => 'effendi',
            'last_name' => "ghazali",
        ]);

        AdminModel::insert([
            'username' => "richard04",
            'password' => Hash::make('12345123'),
            'first_name' => 'Richard',
            'last_name' => "Simanjuntak",
        ]);

        AdminModel::insert([
            'username' => "santiwil",
            'password' => Hash::make('12345123'),
            'first_name' => 'Santi',
            'last_name' => "Wilhelmina",
        ]);
    }
}
