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
                'task_category_id' => 1, // Development
                'name' => 'Build Authentication System',
                'description' => 'Implement user login, registration, and password reset.',
                'status' => 0, // pending
                'priority_id' => 1, // High
                'assigned_to' => 1, // User ID
                'assigned_by' => 2, // User ID
                'is_requested' => 1,
                'is_approved' => 0,
                'due_date' => Carbon::now()->addDays(2),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'task_category_id' => 2, // Design
                'name' => 'Design Landing Page',
                'description' => 'Create responsive UI for the home page.',
                'status' => 1, // in progress
                'priority_id' => 2, // Medium
                'assigned_to' => 2,
                'assigned_by' => 1,
                'is_requested' => 0,
                'is_approved' => 1,
                'due_date' => Carbon::now()->addDays(5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'task_category_id' => 3, // Testing
                'name' => 'Test Payment Gateway',
                'description' => 'Ensure transactions are working with sandbox credentials.',
                'status' => 2, // completed
                'priority_id' => 3, // Low
                'assigned_to' => 2,
                'assigned_by' => 1,
                'is_requested' => 1,
                'is_approved' => 2, // rejected
                'due_date' => Carbon::now()->addDays(7),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // New 5 tasks
            [
                'task_category_id' => 1,
                'name' => 'Setup CI/CD Pipeline',
                'description' => 'Configure GitHub Actions for automated deployments.',
                'status' => 0,
                'priority_id' => 1,
                'assigned_to' => 1,
                'assigned_by' => 2,
                'is_requested' => 1,
                'is_approved' => 0,
                'due_date' => Carbon::now()->addDays(3),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'task_category_id' => 2,
                'name' => 'Create Dashboard Mockup',
                'description' => 'Prepare Figma designs for the admin dashboard.',
                'status' => 1,
                'priority_id' => 2,
                'assigned_to' => 2,
                'assigned_by' => 1,
                'is_requested' => 0,
                'is_approved' => 1,
                'due_date' => Carbon::now()->addDays(4),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'task_category_id' => 3,
                'name' => 'API Integration Testing',
                'description' => 'Test all API endpoints with Postman.',
                'status' => 0,
                'priority_id' => 1,
                'assigned_to' => 1,
                'assigned_by' => 2,
                'is_requested' => 1,
                'is_approved' => 0,
                'due_date' => Carbon::now()->addDays(6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'task_category_id' => 1,
                'name' => 'Database Backup Script',
                'description' => 'Automate daily backups using Laravel Scheduler.',
                'status' => 1,
                'priority_id' => 2,
                'assigned_to' => 2,
                'assigned_by' => 1,
                'is_requested' => 0,
                'is_approved' => 1,
                'due_date' => Carbon::now()->addDays(8),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'task_category_id' => 2,
                'name' => 'Optimize Images',
                'description' => 'Compress and optimize images for better performance.',
                'status' => 2,
                'priority_id' => 3,
                'assigned_to' => 1,
                'assigned_by' => 2,
                'is_requested' => 1,
                'is_approved' => 1,
                'due_date' => Carbon::now()->addDays(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}


