<?php

use App\RoleType;
use Illuminate\Database\Seeder;

class Role_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new RoleType();
        $role->name = 'member';
        $role->save();

        $role = new RoleType();
        $role->name = 'admin';
        $role->save();

        $role = new RoleType();
        $role->name = 'superAdmin';
        $role->save();
    }
}
