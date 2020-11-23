<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class IndexController extends Controller
{
    /**
     * Admin main page.
     *
     * @param Request $request Request
     * 
     * @return View
     */
    public function __invoke(Request $request): View
    {
        Gate::authorize('admin');
        
        $user = $request->user();
        $profile = null;
        if (isset($user->profile)) {
            $profile = $user->profile;
        }
        $currentRouteName = 'backend.admins.index';

        return view(
            'backend.admin.index.index', compact('profile', 'currentRouteName')
        );
    }
}
