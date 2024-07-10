<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $models = Video::class;

    public function definition()
    {
        return [
            'url' => $this->faker->url(),
            'status' => '0',
            'date' => $this->faker->date('Y-m-d'),
        ];
    }
}
