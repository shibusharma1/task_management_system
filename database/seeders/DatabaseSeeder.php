<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            InstitutionSeeder::class,
            PrioritiesTableSeeder::class,
            TaskCategoriesTableSeeder::class,
            DepartmentSeeder::class,
            DesignationSeeder::class,
            UserSeeder::class,
            TasksTableSeeder::class,

        ]);
    }
}
