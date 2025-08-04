<?php

namespace Database\Seeders;

use App\Models\Kpi;
use App\Models\Institution;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KpiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Institution::all()->each(function ($institution) {
            // Kpi::factory()->count(3)->create([ 'institution_id' => $institution->id ]);
        // });
    }
}
