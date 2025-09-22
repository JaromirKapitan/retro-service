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
        Schema::create('web_menu', function (Blueprint $table) {
            $table->id();

            $table->foreignId('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('web_menu');

            $table->nullableMorphs('target');
            $table->integer('order')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_menu');
    }
};
