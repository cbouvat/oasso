<?php

namespace Database\Factories;

use App\Models\MembershipType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Membership>
 */
class MembershipFactory extends Factory
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
            'membership_type_id' => MembershipType::inRandomOrder()->first()->id,
            'amount' => fake()->randomFloat(2, 0, 1000),
            'date_start' => fake()->dateTime(),
            'date_end' => fake()->dateTime(),
            'source' => fake()->randomElement(['web', 'admin']),
        ];
    }
}
