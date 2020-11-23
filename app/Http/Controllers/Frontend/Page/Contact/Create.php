<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend\Page\Contact;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class Create extends Controller
{
    /**
     * Display contact form.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $currentRouteName = 'frontend.pages.contacts';

        return view('frontend.page.contact.create', compact('currentRouteName'));
    }
}
