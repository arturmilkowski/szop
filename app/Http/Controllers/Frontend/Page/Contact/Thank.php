<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Page\Contact;

use App\Http\Controllers\Controller;

class Thank extends Controller
{
    /**
     * Thanks for contact page.
     *
     * @return Object View|RedirectResponse
     */
    public function __invoke(): Object
    {
        // only if mail just send
        if (session()->exists('mail_sent')) {
            session()->forget('mail_sent');
            $currentRouteName = 'frontend.pages.contacts';
            return view('frontend.page.contact.thank', compact('currentRouteName'));
        }

        return redirect()->route('frontend.pages.index');
    }
}
