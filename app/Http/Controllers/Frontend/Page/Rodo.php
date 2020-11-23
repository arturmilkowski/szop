<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class Rodo extends Controller
{
    /**
     * Show rodo.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $currentRouteName = 'frontend.pages.rodo';

        return view(
            'frontend.page.rodo',
            compact('currentRouteName')
        );
    }
}
