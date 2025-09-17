<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Priority;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priorities = [
            ['name' => 'High', 'description' => 'High priority tasks'],
            ['name' => 'Medium', 'description' => 'Medium priority tasks'],
            ['name' => 'Low', 'description' => 'Low priority tasks'],
        ];

        foreach ($priorities as $priority) {
            Priority::firstOrCreate(['name' => $priority['name']], $priority);
        }
    }
}
