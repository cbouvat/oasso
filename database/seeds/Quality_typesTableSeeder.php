<?php

use App\QualityType;
use Illuminate\Database\Seeder;

class Quality_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quality = new QualityType();
        $quality->name = 'treasurer';
        $quality->save();

        $quality = new QualityType();
        $quality->name = 'secretary';
        $quality->save();

        $quality = new QualityType();
        $quality->name = 'volonteer';
        $quality->save();
    }
}
