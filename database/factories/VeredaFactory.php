<?php

namespace Database\Factories;

use App\Models\Municipality;
use App\Models\Vereda;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vereda>
 */
class VeredaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $models = Vereda::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'municipality_id' => Municipality::pluck('id')->random()
        ];
    }
}
