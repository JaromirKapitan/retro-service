<?php

namespace Database\Factories;

use App\Enums\ContentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WebPage>
 */
class WebPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 'title', 'text_short', 'text', 'status'
        $statuses = ContentStatus::values();

        return [
            'title' => fake()->sentence(3),
            'description' => fake()->text(150),
            'content' => fake()->text(300),
            'status' => $statuses[array_rand($statuses)]
        ];
    }
}
