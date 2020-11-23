<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend\LoginRegister;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Show login or register links.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $currentRouteName = 'frontend.login_register.index';

        return view('frontend.login_register.index', compact('currentRouteName'));
    }
}