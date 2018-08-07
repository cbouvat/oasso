<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('gender');
            $table->string('lastname',45);
            $table->string('firstname', 45);
            $table->date('birthdate');
            $table->string('password');
            $table->string('address_line1',32);
            $table->string('address_line_2', 32)->nullable();
            $table->string('zip_code', 20);
            $table->string('city', 45);
            $table->string('email')->unique()->nullable();
            $table->tinyInteger('gender_joint')->nullable();
            $table->string('lastname_joint', 45)->nullable();
            $table->string('firstname_joint', 45)->nullable();
            $table->date('birthdate_joint')->nullable();
            $table->string('email_joint', 45)->nullable();
            $table->string('phone_number_1', 20)->nullable();
            $table->string('phone_number_2', 20)->nullable();
            $table->boolean('volonteer')->default('0');
            $table->text('details_volonteer', 600)->nullable();
            $table->boolean('delivery')->default('0');
            $table->boolean('newspaper');
            $table->boolean('newsletter');
            $table->boolean('mailing')->default('0');
            $table->tinyInteger('comment')->nullable();
            $table->boolean('alert')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
