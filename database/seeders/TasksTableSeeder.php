<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('tasks')->insert([
            [
                'task_category_id' => 1, // e.g. Development
                'name' => 'Build Authentication System',
                'description' => 'Implement user login, registration, and password reset.',
                'status' => 0, // 0 = pending
                'priority_id' => 1, // High
                'assigned_to' => 1, // User ID
                'assigned_by' => 2, // User ID
                'is_requested' => 1, // Requested = Yes
                'is_approved' => 0, // 0 = pending
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'task_category_id' => 2, // e.g. Design
                'name' => 'Design Landing Page',
                'description' => 'Create responsive UI for the home page.',
                'status' => 1, // 1 = in progress
                'priority_id' => 2, // Medium
                'assigned_to' => 2,
                'assigned_by' => 1,
                'is_requested' => 0, // Requested = No
                'is_approved' => 1, // 1 = accepted
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'task_category_id' => 3, // e.g. Testing
                'name' => 'Test Payment Gateway',
                'description' => 'Ensure transactions are working with sandbox credentials.',
                'status' => 2, // 2 = completed
                'priority_id' => 3, // Low
                'assigned_to' => 2,
                'assigned_by' => 1,
                'is_requested' => 1,
                'is_approved' => 2, // 2 = rejected
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

