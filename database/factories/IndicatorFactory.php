<?php

namespace Database\Factories;

use App\Models\Indicator;
use App\Models\Station;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Indicator>
 */
class IndicatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $models = Indicator::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word()
        ];
    }
}
