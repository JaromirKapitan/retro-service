<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\SeoData;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Vehicle;
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

//        Admin::create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//            'password' => bcrypt('test'),
//        ]);

//        WebPage::factory(25)->create();
//        Article::factory(25)->create();
//        Vehicle::factory(25)->create();
//        // for each vehicle
//        Vehicle::all()->each(function ($vehicle) {
//            // check if exist seo data for vehicle (seo data seoble_type=App\Models\Vehicle)
//            $seo = SeoData::where('seoble_type', 'App\Models\Vehicle')->where('seoble_id', $vehicle->id)->first();
//            if (!$seo) {
//                // create seo data for vehicle
//                SeoData::create([
//                    'seoble_id' => $vehicle->id,
//                    'seoble_type' => 'App\Models\Vehicle',
//                    'lang' => $vehicle->lang,
//                    'slug' => strtolower($vehicle->brand . '-' . $vehicle->model . '-' . $vehicle->id),
//                    'keywords' => implode(', ', [$vehicle->brand, $vehicle->model, $vehicle->type]),
//                ]);
//            }
//        });

        // tasks
        \App\Models\Task::factory(30)->create();
    }
}
