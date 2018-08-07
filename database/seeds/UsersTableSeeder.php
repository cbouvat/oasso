<?php

use App\Subscription;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)
            ->create()
            ->each(function ($user) {
            $user->subscription()->save(factory(App\Subscription::class)->create());
            $user->payments()->save(factory(App\Payment::class))->create([
                'payment_type' => 'subscription',
                'payment_id' => function($user) {
                return App\Subscription::where('user_id', $user->id)->id;
                },
                'amount' => function ($user) {
                return App\Subscription::where('user_id', $user->id)->amount;
                }
            ]);
            $user->gifts()->save(factory(App\Gift::class, rand(0, 2)))->create();
            $user->role()->save(factory(App\Role::class))->create();
            $user->quality()->save(factory(App\Quality::class))->create();

        });

    }
}
