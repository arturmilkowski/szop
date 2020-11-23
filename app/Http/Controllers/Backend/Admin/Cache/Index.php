<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Cache;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class Index extends Controller
{
    /**
     * Clear cache.
     *
     * @return RedirectResponse
     */
    public function __invoke(): RedirectResponse
    {
        Gate::authorize('admin');

        $cleared = Cache::flush();

        $message = 'nie udało się wyczyścić pamięci podręcznej';
        $alert = config('settings.ui.backend.alerts.danger');
        if ($cleared) {
            $message = 'wyczyszczono';
            $alert = config('settings.ui.backend.alerts.success');
        }

        return redirect()
            ->route('backend.admins.index')
            ->with('alert', $alert)
            ->with('message', $message);
    }
}
