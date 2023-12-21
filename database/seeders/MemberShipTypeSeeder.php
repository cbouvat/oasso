<?php

namespace Database\Seeders;

use App\Models\MemberShipType;
use Illuminate\Database\Seeder;

class MemberShipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MemberShipType::factory(10)->create();
    }
}
