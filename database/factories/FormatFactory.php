<?php

namespace Database\Factories;

use App\Models\Format;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Format>
 */
class FormatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $models = Format::class;

    public function definition()
    {
        return [
            'url' => $this->faker->url(),
            'module_id' => Module::pluck('id')->random(),
        ];
    }
}
