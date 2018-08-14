<?php

use App\TemplateMail;
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
        //Type = 0 Welcome email
        $templateMail = new TemplateMail();
        $templateMail->type = 0;
        $templateMail->title = 'Welcome to REVV';
        $templateMail->html_content = '<div> <p> TOTO WELCOME</p></div>';
        $templateMail->text_content = 'TOTO WELCOME
                                            ICI §§§§§§    aze';
        $templateMail->save();
    }
}
