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
        Schema::disableForeignKeyConstraints();
        Schema::table('web_menu', function (Blueprint $table){
            $table->dropForeign('web_menu_parent_id_foreign');
            $table->foreign('parent_id')
                ->references('id')->on('web_menu')
                ->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('web_menu', function (Blueprint $table){
            $table->dropForeign('web_menu_parent_id_foreign');
            $table->foreign('parent_id')->references('id')->on('web_menu');
        });
        Schema::enableForeignKeyConstraints();
    }
};
