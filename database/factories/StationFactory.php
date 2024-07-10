<?php

namespace Database\Factories;

use App\Models\Municipality;
use App\Models\Station;
use App\Models\Vereda;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Station>
 */
class StationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $models = Station::class;

    public function definition()
    {
        return [
            'code' => $this->faker->buildingNumber(),
            'name' => $this->faker->word(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'municipality_id' => Municipality::pluck('id')->random(),
            'vereda_id' => Vereda::pluck('id')->random(),
            'status' => '0'
        ];
    }
}
