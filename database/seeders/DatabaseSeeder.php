<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\WebPage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Admin::create([
            'name' => 'kragleh',
            'email' => 'kragleh@gmail.com',
            'password' => bcrypt('kragleh'),
        ]);

        // WebPage::factory(25)->create();
        // Article::factory(25)->create();
    }
}
