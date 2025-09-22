<?php

namespace ClassicWhite\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SeoData;
use App\Models\WebMenu;
use App\Models\WebPage;

class HomeController extends Controller
{
    protected $cars = [
        [
            'title' => 'Trabant P50',
            'image' => 'https://thumbs.dreamstime.com/b/zwickau-germany-august-classic-former-east-german-small-two-stroke-car-p-trabant-exhibited-179327176.jpg'
        ],
        [
            'title' => 'Trabant 600',
            'image' => 'https://thumbs.dreamstime.com/b/green-trabant-sedan-car-parking-front-historical-lighthouse-kap-arkona-place-germany-october-th-261357153.jpg'
        ],
        [
            'title' => 'Trabant 601',
            'image' => 'https://thumbs.dreamstime.com/b/trabant-car-berlin-coat-arms-small-cars-produced-former-east-german-manufacturer-veb-sachsenring-259909319.jpg'
        ],
        [
            'title' => 'Trabant 1.1',
            'image' => 'https://thumbs.dreamstime.com/b/old-trabant-retro-car-parade-old-trabant-car-retro-car-parade-oradea-342493201.jpg'
        ],
        [
            'title' => 'Wartburg 1000',
            'image' => 'https://thumbs.dreamstime.com/b/old-retro-car-wartburg-small-park-autumn-zawiercie-poland-october-263225744.jpg'
        ],
        [
            'title' => 'Wartburg 353',
            'image' => 'https://thumbs.dreamstime.com/b/old-classic-car-static-exhibition-old-vintage-wartburg-car-137231194.jpg'
        ],
        [
            'title' => 'Barkas Framo',
            'image' => 'https://thumbs.dreamstime.com/b/die-oldtimer-show-paaren-im-glien-germany-october-light-truck-framo-v-199146741.jpg'
        ],
        [
            'title' => 'Barkas 1000',
            'image' => 'https://thumbs.dreamstime.com/b/rostov-don-russia-october-cyan-retro-minivan-barkas-b-show-old-cars-embankment-don-river-cyan-retro-minivan-131294401.jpg'
        ]
    ];

    public function index()
    {
        $menu = WebMenu::whereNull('parent_id')->get();

        return view('classic-white::home', compact('menu'));
    }

    public function show($slug)
    {
        $menu = WebMenu::whereNull('parent_id')->get();
        $seo = SeoData::slug($slug)->first();
        return view('classic-white::show', [
            'menu' => $menu,
            'seoble' => $seo->seoble
        ]);
    }
}
