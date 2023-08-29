<?php

namespace App\Http\Controllers\Backend\Admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Customer\Customer;
use App\Models\Order\Voivodeship;
use App\Http\Requests\Customer\StoreCustomerRequest;

class CustomerController extends Controller
{
    public function index(): View
    {
        $collection = Customer::orderBy('created_at', 'desc')->get();

        return view('backend.admin.customer.index', ['collection' => $collection]);
    }

    public function create(): View
    {
        $voivodeships = Voivodeship::all();

        return view('backend.admin.customer.create', ['voivodeships' => $voivodeships]);
    }

    public function store(StoreCustomerRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Customer::create($validated);

        return redirect(route('backend.admins.customers.index'))->with('message', 'Dodano');
    }

    public function show(Customer $customer): View
    {
        return view('backend.admin.customer.show', ['item' => $customer]);
    }

    public function edit(Customer $customer): View
    {
        $voivodeships = Voivodeship::all();

        return view('backend.admin.customer.edit', ['voivodeships' => $voivodeships, 'item' => $customer]);
    }

    public function update(StoreCustomerRequest $request, Customer $customer)
    {
        $validated = $request->validated();
        $customer->update($validated);

        return redirect(route('backend.admins.customers.index'))->with('message', 'Zmieniono');
    }

    public function destroy(Customer $customer): RedirectResponse
    {
        if ($customer->order) {
            $customer->order->delete();
        }
        $customer->delete();

        return redirect(route('backend.admins.customers.index'))->with('message', 'Usunięto');
    }
}
