<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Institution::create([
            'client_id' => 'CLT-' . Str::random(6),
            'name' => 'Passion Chasers Pvt. Ltd.',
            'address' => 'Biratnagar, Nepal',
            'phone' => '9819099126',
            'email' => 'info@passionchaser.com',
            'website' => 'https://passionchaser.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
