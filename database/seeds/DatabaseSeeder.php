<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(RoleTypesTableSeeder::class);
        $this->call(Subscription_typesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GiftsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(NewslettersTableSeeder::class);
        $this->call(UsersWithRoleTableSeeder::class);
    }
}
