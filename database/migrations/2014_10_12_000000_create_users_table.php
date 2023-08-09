<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 255);
            $table->string('email')->unique();
            $table->string('firstname', 45);
            $table->string('lastname', 45);
            $table->tinyInteger('gender');
            $table->date('birthdate');
            $table->string('address_line1', 255);
            $table->string('address_line2', 255);
            $table->integer('zipcode')->unsigned();
            $table->string('city', 45);
            $table->string('email')->unique()->nullable();
            $table->string('phone1', 10)->nullable();
            $table->string('phone2', 10)->nullable();
            $table->boolean('volunteer')->default(0);
            $table->boolean('delivery')->default(0);
            $table->boolean('newspaper')->default(0);
            $table->boolean('newsletter')->default(0);
            $table->boolean('mailing')->default(0);
            $table->boolean('comment')->nullable();
            $table->boolean('alert')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
