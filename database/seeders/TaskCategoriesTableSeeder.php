<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskCategory;

class TaskCategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'General', 'description' => 'Tasks related to all other things except Department Specific'],
            ['name' => 'Development', 'description' => 'Tasks related to software development'],
            ['name' => 'Design', 'description' => 'UI/UX and graphic design tasks'],
            ['name' => 'Testing', 'description' => 'QA and testing tasks'],
            ['name' => 'Documentation', 'description' => 'Project documentation tasks'],
        ];

        foreach ($categories as $category) {
            TaskCategory::firstOrCreate(['name' => $category['name']], $category);
        }
    }
}
