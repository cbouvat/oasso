<?php

namespace Database\Seeders;

use App\Models\MemberShip;
use Illuminate\Database\Seeder;

class MemberShipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MemberShip::factory(10)->create();
    }
}
