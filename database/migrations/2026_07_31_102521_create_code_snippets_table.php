<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('code_snippets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title', 150);
            $table->text('description')->nullable();
            $table->string('language', 50);
            $table->longText('code');
            $table->boolean('is_favorite')->default(false);
            $table->timestamps();

            // Composite index — speeds up "my PHP snippets" style queries
            $table->index(['user_id', 'language']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('code_snippets');
    }
};