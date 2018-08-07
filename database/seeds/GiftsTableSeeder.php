<?php

use Illuminate\Database\Seeder;

class GiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Gift::class, 20)->create([
            'user_id' => rand(1, 50)
        ]);
    }
}

