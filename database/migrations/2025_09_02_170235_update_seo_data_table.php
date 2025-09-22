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
        Schema::table('seo_data', function (Blueprint $table){
            $table->dropUnique(['slug']);
            $table->enum('lang', \App\Enums\Lang::values())->default(config('app.locale'))->after('seoble_id');
            $table->unique(['slug', 'lang']);
            $table->dropColumn(['title' ,'description', 'canonical_url', 'robots']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seo_data', function (Blueprint $table){
            $table->dropUnique(['slug', 'lang']);
            $table->dropColumn(['lang']);
            $table->unique(['slug']);

            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('robots', 50)->nullable();
        });
    }
};
