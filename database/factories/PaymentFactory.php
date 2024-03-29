<?php

namespace Database\Factories;

use App\Models\Donation;
use App\Models\Membership;
use App\Models\PaymentType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $seed = [
            'user_id' => User::inRandomOrder()->first()->id,
            'payment_type_id' => PaymentType::inRandomOrder()->first()->id,
            'date' => fake()->dateTime(),
            'status' => fake()->randomElement(['pending', 'paid', 'failed']),
            'external_reference' => fake()->text(250),
            'amount' => fake()->randomFloat(2, 0, 1000),
        ];

        if (random_int(0, 1) !== 0) {
            $seed['membership_id'] = Membership::inRandomOrder()->first()->id;
        } else {
            $seed['donation_id'] = Donation::inRandomOrder()->first()->id;
        }

        return $seed;
    }
}
