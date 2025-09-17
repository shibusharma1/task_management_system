<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Designation;
use App\Models\Institution;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $institutionId = DB::table('institutions')->first()->id;
        $adminDesignation = Designation::where('hierarchy_level', 0)->first()->id;
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'institution_id' => $institutionId,
            'designation_id' => $adminDesignation,
            // 'hierarchy_level' => 0,
        ]);
    }
}
