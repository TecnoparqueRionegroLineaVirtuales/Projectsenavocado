<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Document;
use App\Models\StatusDocument;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $models = Document::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'url_photo' => $this->faker->url(),
            'url_file' => $this->faker->url(),
            'date_publication' => $this->faker->date('Y-m-d'),
            'author_id' => Author::pluck('id')->random(),
            'status' => '0'
        ];
    }
}
