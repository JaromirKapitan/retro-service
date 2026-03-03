<?php

namespace Database\Factories;

use App\Enums\LangEnum;
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
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->text(150),
            'content' => fake()->text(300),
            'lang' => fake()->randomElement(LangEnum::values()),
        ];
    }

    public function withParent(int $parentId): static
    {
        return $this->state(fn(array $attributes) => [
            'parent_id' => $parentId,
        ]);
    }
}
