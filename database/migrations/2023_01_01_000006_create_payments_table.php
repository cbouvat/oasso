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
        Schema::create('payments', static function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('payment_type_id')->constrained();
            $table->date('date');
            $table->foreignId('donation_id')->nullable()->constrained();
            $table->foreignId('membership_id')->nullable()->constrained();
            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending');
            $table->string('external_reference', 250);
            $table->unsignedDecimal('amount', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
