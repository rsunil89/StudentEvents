<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Clear tables (optional but useful)
        DB::table('bookings')->delete();
        DB::table('events')->delete();
        DB::table('users')->delete();

        // ======================
        // USERS
        // ======================
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@test.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Student User',
                'email' => 'student@test.com',
                'password' => Hash::make('password'),
                'role' => 'student',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // ======================
        // EVENTS
        // ======================
        DB::table('events')->insert([
            [
                'title' => 'Campus Welcome Event',
                'description' => 'Welcome session for new students.',
                'date' => now()->addDays(5),
                'location' => 'Main Hall',
                'capacity' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tech Talk',
                'description' => 'Talk about web development trends.',
                'date' => now()->addDays(10),
                'location' => 'Room A1',
                'capacity' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // ======================
        // BOOKINGS
        // ======================
        DB::table('bookings')->insert([
            [
                'user_id' => 2, // student
                'event_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}