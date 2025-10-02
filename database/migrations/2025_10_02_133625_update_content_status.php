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
        Schema::table('web_pages', function (Blueprint $table){
            $table->enum('status', ['published', 'draft', 'archived'])->nullable()->default(null)->change();
        });
        Schema::table('articles', function (Blueprint $table){
            $table->enum('status', ['published', 'draft', 'archived'])->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('web_pages', function (Blueprint $table){
            $table->enum('status', ['published', 'draft', 'archived'])->default('draft')->change();
        });
        Schema::table('articles', function (Blueprint $table){
            $table->enum('status', ['published', 'draft', 'archived'])->default('draft')->change();
        });
    }
};
