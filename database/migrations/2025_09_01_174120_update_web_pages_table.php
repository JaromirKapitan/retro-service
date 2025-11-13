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
            $table->enum('lang', ['sk','cs','en'])->default(config('app.locale'));

            $table->foreignId('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('web_pages');

            $table->renameColumn('text_short', 'description')->after('text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('web_pages', function (Blueprint $table){
            $table->dropForeign(['parent_id']);
            $table->dropColumn(['parent_id']);

            $table->dropColumn(['lang']);

            $table->renameColumn('description', 'text_short')->after('text');
        });
    }
};
