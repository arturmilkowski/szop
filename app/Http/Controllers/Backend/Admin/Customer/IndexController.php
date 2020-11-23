<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Customer;

class IndexController extends Controller
{
    /**
     * Lists of customers.
     * (Clients without registration)
     *
     * @return View
     */
    public function __invoke(): View
    {
        Gate::authorize('admin');
        
        $customers = Customer::orderBy('created_at', 'desc')->get();
        $currentRouteName = 'backend.admins.customers';

        return view(
            'backend.admin.customer.index',
            compact('customers', 'currentRouteName')
        );
    }
}
