<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TermCondition extends Controller
{
    /**
     * Show shop terms and conditions.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $currentRouteName = 'frontend.pages.term_condition';

        return view(
            'frontend.page.term_condition',
            compact('currentRouteName')
        );
    }
}
