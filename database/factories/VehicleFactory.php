<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // protected $fillable = ['type', 'brand', 'model', 'year_from', 'year_to', 'description', 'content', 'status', 'lang', 'parent_id', 'specs', 'modifications', 'links', 'published_at', 'published_until'];

        return [
            // type from Type enum: car, bus, motorcycle
            'type' => $this->faker->randomElement(['car', 'bus', 'motorcycle']),
            'brand' => $this->faker->company(),
            'model' => $this->faker->word(),
            'year_from' => $this->faker->numberBetween(1990, 2022),
            'year_to' => $this->faker->optional()->numberBetween(1991, 2023),
            'description' => $this->faker->sentence(),
            //content in markdown format
            'content' => $this->faker->paragraphs(3, true),
            // status from Status enum: Draft, Published, Archived
            'status' => $this->faker->randomElement(['Draft', 'Published', 'Archived']),
            // lang from Lang enum: sk, cs, en
            'lang' => $this->faker->randomElement(['sk', 'cs', 'en']),
            'parent_id' => null,
            // specs - html table
            'specs' => '<table><tr><th>Spec</th><th>Value</th></tr><tr><td>Engine</td><td>' . $this->faker->word() . '</td></tr><tr><td>Horsepower</td><td>' . $this->faker->numberBetween(50, 500) . ' HP</td></tr></table>',
            'modifications' => "",
            'links' => "",
            // published_at - 50/50 chance null or datetime between -1 year and +1 years
            'published_at' => $this->faker->optional()->dateTimeBetween('-1 years', 'now'),
            // published_until - 50/50 chance null or datetime more then published_at and between -1 year and +1 years
            'published_until' => $this->faker->optional()->dateTimeBetween('-1 month', '+1 years'),
        ];
    }
}
