<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            DonationSeeder::class,
            NewsletterSeeder::class,
            MembershipTypeSeeder::class,
            MembershipSeeder::class,
            PaymentTypeSeeder::class,
            PaymentSeeder::class,
        ]);
    }
}
