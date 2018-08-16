<?php

use App\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentMethod = new PaymentMethod();
        $paymentMethod->name = 'paypal';
        $paymentMethod->save();

        $paymentMethod = new PaymentMethod();
        $paymentMethod->name = 'creditcard';
        $paymentMethod->save();

        $paymentMethod = new PaymentMethod();
        $paymentMethod->name = 'cash';
        $paymentMethod->save();

        $paymentMethod = new PaymentMethod();
        $paymentMethod->name = 'cheque';
        $paymentMethod->save();

        $paymentMethod = new PaymentMethod();
        $paymentMethod->name = 'transfer';
        $paymentMethod->save();
    }
}
