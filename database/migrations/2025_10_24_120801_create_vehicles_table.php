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
        $vehicleTypes = ['motorcycle', 'car', 'bus'];

        Schema::create('vehicles', function (Blueprint $table) use ($langs, $vehicleTypes) {
            $table->id();

            $table->enum('type', $vehicleTypes)->nullable();

            $table->string('brand'); // skoda, wartburg, bmw, audi, ford, chevrolet, etc.
            $table->string('model'); // octavia, mustang, camaro, etc.

            $table->string('year_from');
            $table->string('year_to')->nullable();

            $table->text('description')->nullable();
            $table->text('content')->nullable();

            $table->text('specs')->nullable();
            $table->text('modifications')->nullable();
            $table->text('links')->nullable();

            $table->enum('lang', $langs)->nullable();
            $table->foreignId('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('vehicles');

            $table->enum('status', ['published', 'draft', 'archived'])->default('draft');

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
