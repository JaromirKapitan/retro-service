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
        $langs = ['sk','cs','en'];
        Schema::table('articles', function (Blueprint $table) use ($langs){
            $table->enum('lang', $langs)->default(null)->change();
        });
        Schema::table('seo_data', function (Blueprint $table) use ($langs){
            $table->enum('lang', $langs)->default(null)->change();
        });
        Schema::table('web_pages', function (Blueprint $table) use ($langs){
            $table->enum('lang', $langs)->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table){
            $table->enum('lang', \App\Enums\Lang::values())->default(config('app.locale'))->change();
        });
        Schema::table('seo_data', function (Blueprint $table){
            $table->enum('lang', \App\Enums\Lang::values())->default(config('app.locale'))->change();
        });
        Schema::table('web_pages', function (Blueprint $table){
            $table->enum('lang', \App\Enums\Lang::values())->default(config('app.locale'))->change();
        });
    }
};
