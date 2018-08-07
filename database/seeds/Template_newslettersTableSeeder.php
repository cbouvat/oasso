<?php

use Illuminate\Database\Seeder;

class Template_newslettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TemplateNewsletter::class, 25)->create();
    }
}
