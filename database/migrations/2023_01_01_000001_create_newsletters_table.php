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
        Schema::create('newsletters', static function (Blueprint $table): void {
            $table->id();
            $table->string('subject', 150);
            $table->longText('html_content');
            $table->longText('text_content');
            $table->enum('status', ['draft', 'sending', 'sent'])->default('draft');
            $table->unsignedInteger('send_counter')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsletters');
    }
};
