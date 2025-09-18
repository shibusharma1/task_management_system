<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Designation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Make sure related data exists
        $institutionId = DB::table('institutions')->first()->id;
        $departmentId = DB::table('departments')->first()->id;

        $adminDesignation = Designation::where('hierarchy_level', 0)->first()->id;
        $managerDesignation = Designation::where('hierarchy_level', 1)->first()->id;
        $employeeDesignation = Designation::where('hierarchy_level', 2)->first()->id;

        // 1. Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'institution_id' => $institutionId,
            'designation_id' => $adminDesignation,
            'department_id' => $departmentId,
        ]);

        // 2. Manager User
        User::create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('password'),
            'institution_id' => $institutionId,
            'designation_id' => $managerDesignation,
            'department_id' => $departmentId,
        ]);

        // 3. Employee One
        User::create([
            'name' => 'Employee One',
            'email' => 'employee1@gmail.com',
            'password' => Hash::make('password'),
            'institution_id' => $institutionId,
            'designation_id' => $employeeDesignation,
            'department_id' => $departmentId,
        ]);

        // 4. Employee Two
        User::create([
            'name' => 'Employee Two',
            'email' => 'employee2@gmail.com',
            'password' => Hash::make('password'),
            'institution_id' => $institutionId,
            'designation_id' => $employeeDesignation,
            'department_id' => $departmentId,
        ]);

        // 5. Employee Three
        User::create([
            'name' => 'Employee Three',
            'email' => 'employee3@gmail.com',
            'password' => Hash::make('password'),
            'institution_id' => $institutionId,
            'designation_id' => $employeeDesignation,
            'department_id' => $departmentId,
        ]);
    }
}
