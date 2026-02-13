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
        // drop web_menu_items table
        Schema::dropIfExists('web_menu_items');
        // drop web_menu table
        Schema::dropIfExists('web_menu');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // create web_menu table
        Schema::create('web_menu', function (Blueprint $table) {
            $table->id();

            $table->foreignId('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('web_menu');

            $table->nullableMorphs('target');
            $table->integer('order')->nullable();

            $table->timestamps();
        });

        Schema::disableForeignKeyConstraints();
        Schema::table('web_menu', function (Blueprint $table){
            $table->dropForeign('web_menu_parent_id_foreign');
            $table->foreign('parent_id')
                ->references('id')->on('web_menu')
                ->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();

        // create web_menu_items table
        Schema::create('web_menu_items', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->enum('lang', ['sk','cs','en'])->default(config('app.locale'));

            $table->foreignId('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('web_menu_items');

            $table->timestamps();
        });
    }
};
