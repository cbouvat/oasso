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
        Schema::create('users', static function (Blueprint $table): void {
            $table->id();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('last_name', 45)->index();
            $table->string('first_name', 45);
            $table->date('date_of_birth')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('newsletter')->default(0);
            $table->string('password', 150);
            $table->rememberToken();
            $table->string('address', 100)->nullable();
            $table->string('address_2', 100)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('phone_2', 20)->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->text('comment')->nullable();
            $table->string('job', 50)->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_phone')->nullable();
            $table->integer('nb_children')->nullable();
            $table->foreignId('parent_id')->nullable();
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
