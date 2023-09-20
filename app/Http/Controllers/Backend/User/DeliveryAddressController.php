<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\StoreDeliverAddress;
use App\Models\User\DeliveryAddress;
use App\Models\Order\Voivodeship;

class DeliveryAddressController extends Controller
{
    public function create(): View
    {
        $voivodeships = Voivodeship::all();
        $user = Auth::user();

        return view('backend.user.delivery-address.create', ['voivodeships' => $voivodeships, 'item' => $user]);
    }

    public function store(StoreDeliverAddress $request): RedirectResponse
    {
        $validated = $request->validated();
        DeliveryAddress::create($validated);

        return redirect(route('backend.users.profiles.delivery-adresses.show'))->with('message', 'Dodano');
    }

    public function show(): View
    {
        $user = Auth::user();

        return view('backend.user.delivery-address.show', ['item' => $user]);
    }

    public function edit(): View
    {
        $voivodeships = Voivodeship::all();
        $user = Auth::user();
        $item = $user->profile->DeliveryAddress;

        return view('backend.user.delivery-address.edit', ['voivodeships' => $voivodeships, 'item' => $item]);
    }

    public function update(StoreDeliverAddress $request): RedirectResponse
    {
        $validated = $request->validated();
        $user = Auth::user();
        $user->profile->deliveryAddress->update($validated);

        return redirect(route('backend.users.profiles.delivery-adresses.show'))->with('message', 'Zmieniono');
    }

    public function destroy(): RedirectResponse
    {
        $user = Auth::user();
        $user->profile->DeliveryAddress->delete();

        return redirect(route('backend.users.profiles.show'))->with('message', 'Usunięto');
    }
}
