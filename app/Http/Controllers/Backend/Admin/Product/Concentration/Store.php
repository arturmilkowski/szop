<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product\Concentration;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\Models\Concentration;
use App\Http\Requests\StoreConcentration;


class Store extends Controller
{
    /**
     * Store concentration.
     *
     * @param StoreConcentration $request Validation
     * 
     * @return RedirectResponse
     */
    public function __invoke(StoreConcentration $request): RedirectResponse
    {
        Gate::authorize('admin');

        $validated = $request->validated();
        Concentration::create($validated);        

        return redirect()
            ->route('backend.admins.products.concentrations.index')
            ->with('alert', config('settings.ui.backend.alerts.success'))
            ->with('message', config('settings.ui.backend.messages.added'));
    }
}
