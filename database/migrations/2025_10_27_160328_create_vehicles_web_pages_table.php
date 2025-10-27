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
        Schema::create('vehicle_web_page', function (Blueprint $table) {
            $table->foreignId('web_page_id');
            $table->foreign('web_page_id')->references('id')->on('web_pages');

            $table->foreignId('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');

            $table->primary(['web_page_id', 'vehicle_id']);
            $table->unique(['web_page_id', 'vehicle_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_web_page');
    }
};
