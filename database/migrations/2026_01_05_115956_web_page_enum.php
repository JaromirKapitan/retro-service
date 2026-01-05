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
        Schema::table('web_pages', function (Blueprint $table) {
            $table->enum('for', ['home', 'vehicles'])->nullable();
        });

        // if column home = 1 then set for = 'home'
        \App\Models\WebPage::where('home', 1)->update(['for' => 'home']);

        // if column for_vehicles = 1 then set for = 'vehicles'
        \App\Models\WebPage::where('for_vehicles', 1)->update(['for' => 'vehicles']);

        // remove columns home and for_vehicles
        Schema::table('web_pages', function (Blueprint $table) {
            $table->dropColumn('home');
            $table->dropColumn('for_vehicles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('web_pages', function (Blueprint $table) {
            $table->boolean('home')->nullable()->default(null);
            $table->boolean('for_vehicles')->nullable()->default(null);
        });

        // if for = 'home' then set home = 1
        \App\Models\WebPage::where('for', 'home')->update(['home' => 1]);
        // if for = 'vehicles' then set for_vehicles = 1
        \App\Models\WebPage::where('for', 'vehicles')->update(['for_vehicles' => 1]);

        // drop column for
        Schema::table('web_pages', function (Blueprint $table) {
            $table->dropColumn('for');
        });
    }
};
