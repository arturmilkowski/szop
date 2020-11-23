<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product\Concentration;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\Concentration;
use Illuminate\Http\Request;

class Destroy extends Controller
{
    /**
     * Deleting the concentration of product.
     *
     * @param Request       $request       Request
     * @param Concentration $concentration Concentration
     * 
     * @return object View | RedirectResponse
     */
    public function __invoke(Request $request, Concentration $concentration): object
    {
        Gate::authorize('admin');

        $answer = $request->input('delete');

        $currentRouteName = 'backend.admins.products';

        $message = config('settings.ui.backend.messages.not_removed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($answer == 'Yes') {
            $deleted = $concentration->delete();

            if ($deleted) {
                $message = config('settings.ui.backend.messages.removed');
                $alert = config('settings.ui.backend.alerts.success');
            }

            return redirect()
                ->route('backend.admins.products.concentrations.index')
                ->with('alert', $alert)
                ->with('message', $message);
        }

        return view(
            'backend.admin.product.concentration.destroy',
            compact('concentration', 'currentRouteName')
        );
    }
}
