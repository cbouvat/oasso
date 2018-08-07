<?php

use App\User;
use Illuminate\Database\Seeder;

class QualitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            factory(App\Quality::class)->create([
                'user_id' => $user->id
            ]);
        }
    }
}
