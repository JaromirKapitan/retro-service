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
        return inertia('HomePage', [
            'stats' => $this->homePageService->getStats(),
            'page' => $this->homePageService->getPage(),
        ]);
    }
}
