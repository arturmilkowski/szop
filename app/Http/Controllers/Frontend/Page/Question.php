<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class Question extends Controller
{
    /**
     * Frequently asked questions and answers.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $currentRouteName = 'frontend.pages.question';

        return view('frontend.page.question', compact('currentRouteName'));
    }
}