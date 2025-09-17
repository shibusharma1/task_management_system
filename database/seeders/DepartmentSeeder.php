<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'department_name' => 'Human Resources',
                'department_code' => 'HR',
                'description' => 'Handles recruitment, employee relations, payroll, and benefits.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Finance',
                'department_code' => 'FIN',
                'description' => 'Responsible for budgeting, accounting, and financial planning.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Information Technology',
                'department_code' => 'IT',
                'description' => 'Manages IT infrastructure, software, and support.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Marketing',
                'department_code' => 'MKT',
                'description' => 'Oversees branding, advertising, and market research.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Operations',
                'department_code' => 'OPS',
                'description' => 'Ensures smooth day-to-day business operations.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

