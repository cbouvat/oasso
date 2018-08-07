<?php

use Illuminate\Database\Seeder;

class Template_mailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TemplateMail::class, 25)->create();
    }
}
