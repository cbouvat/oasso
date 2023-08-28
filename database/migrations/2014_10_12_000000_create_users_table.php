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
            $table->string('name', 255)->default('');
            $table->string('email')->unique();
            $table->string('firstname', 45)->default('');
            $table->string('lastname', 45)->default('');
            $table->tinyInteger('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('address_line1', 255)->default('');
            $table->string('address_line2', 255)->default('');
            $table->integer('zipcode')->unsigned()->nullable();
            $table->string('city', 45)->default('');
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
            $table->string('password')->default('');
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
