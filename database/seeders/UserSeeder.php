<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Tyler Murphy',
                'email' => 'tyler@mail.com',
                'password' => Hash::make('password123'),
                'role' => 'student',
            ],
            [
                'name' => 'Sarah Kelly',
                'email' => 'sarah@mail.com',
                'password' => Hash::make('password123'),
                'role' => 'student',
            ],
            [
                'name' => 'John OBrien',
                'email' => 'john@mail.com',
                'password' => Hash::make('password123'),
                'role' => 'student',
            ],
            [
                'name' => 'Emma Byrne',
                'email' => 'emma@mail.com',
                'password' => Hash::make('password123'),
                'role' => 'student',
            ],
            [
                'name' => 'Luke Walsh',
                'email' => 'luke@mail.com',
                'password' => Hash::make('password123'),
                'role' => 'student',
            ],
            [
                'name' => 'Megan Doyle',
                'email' => 'megan@mail.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Aoife Ryan',
                'email' => 'aoife@mail.com',
                'password' => Hash::make('password123'),
                'role' => 'student',
            ],
            [
                'name' => 'David Nolan',
                'email' => 'david@mail.com',
                'password' => Hash::make('password123'),
                'role' => 'student',
            ],
            [
                'name' => 'Chloe Byrne',
                'email' => 'chloe@mail.com',
                'password' => Hash::make('password123'),
                'role' => 'student',
            ],
            [
                'name' => 'Admin Test',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
        ]);
    }
}
