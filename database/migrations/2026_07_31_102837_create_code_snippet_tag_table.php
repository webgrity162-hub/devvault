<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('code_snippet_tag', function (Blueprint $table) {
            $table->foreignId('code_snippet_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete();

            $table->primary(['code_snippet_id', 'tag_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('code_snippet_tag');
    }
};