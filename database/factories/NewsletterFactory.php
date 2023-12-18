<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Newsletter>
 */
class NewsletterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject' => fake()->sentence(),
            'html_content' => fake()->paragraphs(3, true),
            'text_content' => fake()->paragraphs(3, true),
            'status' => fake()->randomElement(['draft', 'sending', 'sent']),
            'send_counter' => fake()->numberBetween(0, 1000),
        ];
    }
}
