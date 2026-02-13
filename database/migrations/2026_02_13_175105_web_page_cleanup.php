<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('web_pages', function (Blueprint $table) {
            // remove columns: status, published_at, published_until, for
            $table->dropColumn(['status', 'published_at', 'published_until', 'for']);
            // drop soft deletes
            $table->dropSoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('web_pages', function (Blueprint $table) {
            // add columns: status, published_at, published_until, for
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamp('published_until')->nullable();
            $table->string('for')->nullable();
            // add soft deletes
            $table->softDeletes();
        });
    }
};
