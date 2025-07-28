<?php

namespace Database\Factories;

use App\Models\Kpi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kpi>
 */
class KpiFactory extends Factory
{
    protected $model = Kpi::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'weight' => $this->faker->numberBetween(10, 100),
        ];
    }
}
