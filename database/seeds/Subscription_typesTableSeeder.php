<?php

use App\SubscriptionType;
use Illuminate\Database\Seeder;

class Subscription_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentMethod = new SubscriptionType();
        $paymentMethod->name = 'unemployed';
        $paymentMethod->amount = 0;
        $paymentMethod->save();

        $paymentMethod = new SubscriptionType();
        $paymentMethod->name = 'family';
        $paymentMethod->amount = 15;
        $paymentMethod->save();

        $paymentMethod = new SubscriptionType();
        $paymentMethod->name = 'individual';
        $paymentMethod->amount = 10;
        $paymentMethod->save();

        $paymentMethod = new SubscriptionType();
        $paymentMethod->name = 'student';
        $paymentMethod->amount = 5;
        $paymentMethod->save();
    }
}
