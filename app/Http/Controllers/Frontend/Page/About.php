<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class About extends Controller
{
    /**
     * About front page.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $currentRouteName = 'frontend.pages.about';

        return view('frontend.page.about', compact('currentRouteName'));
    }
}
