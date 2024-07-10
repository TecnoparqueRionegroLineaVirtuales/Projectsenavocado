<?php

namespace Database\Factories;

use App\Models\Data;
use App\Models\Indicator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Data>
 */
class DataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $models = Data::class;

    public function definition()
    {
        return [
            'value' => $this->faker->buildingNumber(),
            'date' => $this->faker->dateTime(),
            'indicator_id' => Indicator::pluck('id')->random(),
            'station_id' => Indicator::pluck('id')->random()

        ];
    }
}
