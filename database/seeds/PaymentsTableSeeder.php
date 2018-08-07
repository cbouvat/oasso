<?php

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
                'payment_type' => 'subscription',
                'payment_id' => $sub->id,
                'amount' => $sub->amount,
                'user_id' => $sub->user_id
            ]);
        }
    }
}
