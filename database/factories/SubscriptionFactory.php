<?php

namespace Database\Factories;

use App\Models\SubscriptionType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'subscription_type_id' => SubscriptionType::inRandomOrder()->first()->id,
            'amount' => fake()->randomFloat(2, 0, 1000),
            'date_start' => fake()->dateTime(),
            'date_end' => fake()->dateTime(),
            'source' => fake()->randomElement(['web', 'admin']),
        ];
    }
}
