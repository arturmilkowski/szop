<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product\Concentration;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\Models\Concentration;
use App\Http\Requests\StoreConcentration;

class Update extends Controller
{
    /**
     * Update category.
     *
     * @param StoreConcentration $request       Validation
     * @param Concentration      $concentration Concentration
     * 
     * @return RedirectResponse
     */
    public function __invoke(
        StoreConcentration $request,
        Concentration $concentration
    ): RedirectResponse {
        Gate::authorize('admin');
        
        $validated = $request->validated();
        $message = config('settings.ui.backend.messages.not_changed');
        $alert = config('settings.ui.backend.alerts.warning');

        $concentration->update($validated);

        if ($concentration->wasChanged()) {
            $message = config('settings.ui.backend.messages.changed');
            $alert = config('settings.ui.backend.alerts.success');
        }

        return redirect()
            ->route(
                'backend.admins.products.concentrations.show', [$concentration->id]
            )
            ->with('alert', $alert)
            ->with('message', $message);
    }
}
