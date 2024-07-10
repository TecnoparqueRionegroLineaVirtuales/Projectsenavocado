<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $models = Module::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'url_photo' => $this->faker->url(),
            'description' => $this->faker->paragraph()
        ];
    }
}
