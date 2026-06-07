<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('authors', 500);
            $table->smallInteger('year');
            $table->string('venue', 255)->nullable();
            $table->string('doi', 255)->nullable()->unique();
            $table->string('url', 1000)->nullable();
            $table->enum('type', ['article', 'tcc', 'conference', 'book', 'other'])->default('article');
            $table->text('abstract')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('year');
            $table->index('type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
