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
        Schema::create('article_web_page', function (Blueprint $table) {
            $table->foreignId('web_page_id');
            $table->foreign('web_page_id')->references('id')->on('web_pages');

            $table->foreignId('article_id');
            $table->foreign('article_id')->references('id')->on('articles');

            $table->primary(['web_page_id', 'article_id']);
            $table->unique(['web_page_id', 'article_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_web_page');
    }
};
