<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Institution;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Institution::all()->each(function ($institution) {
        // User::factory()->count(5)->create([ 'institution_id' => $institution->id ]);
        // });
             User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'), // Always hash passwords
            // 'institution_id' => 1, // Make sure this institution exists
            'designation' => 'Admin',
            'hierarchy_level' => 0,
        ]);
    }
}
