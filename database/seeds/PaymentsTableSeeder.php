<?php

use App\Gift;
use App\Subscription;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subs = Subscription::all();

        foreach ($subs as $sub) {
            factory(App\Payment::class)->create([
                'payment_type' => 'App\Subscription',
                'payment_id' => $sub->id,
                'amount' => $sub->amount,
                'user_id' => $sub->user_id
            ]);
        }

        $gifts = Gift::all();

        foreach ($gifts as $gift) {
            factory(App\Payment::class)->create([
                'payment_type' => 'App\Gift',
                'payment_id' => $gift->id,
                'amount' => $gift->amount,
                'user_id' => $gift->user_id
            ]);
        }
    }
}
