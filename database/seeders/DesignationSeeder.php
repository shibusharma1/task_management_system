<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Designation::create([
            'designation_name' => 'Admin',
            'hierarchy_level' => 0,
        ]);

        Designation::create([
            'designation_name' => 'Manager',
            'hierarchy_level' => 1,
        ]);

        Designation::create([
            'designation_name' => 'Employee',
            'hierarchy_level' => 2,
        ]);
    }
}
