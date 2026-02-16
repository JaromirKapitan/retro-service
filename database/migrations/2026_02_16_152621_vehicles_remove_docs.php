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
        // remove docs column from vehicles
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn('docs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // add docs column to vehicles
        Schema::table('vehicles', function (Blueprint $table) {
            $table->text('docs')->nullable();
        });
    }
};
