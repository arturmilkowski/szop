<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Voivodeship;
use App\Models\Profile;

class Create extends Controller
{
    /**
     * Show the form for creating a new profile.
     * 
     * @return View
     */
    public function __invoke() //: View
    {
        // $user = Auth::user();
        // Auth::user()
        $this->authorize('create', Profile::class);
        // Profile::class

        $voivodeships = Voivodeship::all();
        $currentRouteName = 'backend.users.profiles';

        return view(
            'backend.user.profile.create',
            compact('voivodeships', 'currentRouteName')
        );
    }
}
