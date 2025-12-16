<?php

namespace App\Http\Controllers;

use App\Services\HomePageService;

class HomeController extends Controller
{
    public function __construct(
        private HomePageService $homePageService
    ) {}

    public function index()
    {
        $page = $this->homePageService->getPage();

        return inertia('HomePage', [
            'stats' => $this->homePageService->getStats(),
            'page' => $page,
            'hero_img' => $page->getMedia('images')->first()->getUrl(),
        ]);
    }
}
