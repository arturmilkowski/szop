<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\StoreProfileRequest;
use App\Models\User\Profile;
use App\Models\Order\Voivodeship;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $voivodeships = Voivodeship::all();

        return view('backend.user.profile.create', ['voivodeships' => $voivodeships]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        $validated = $request->validated();
        Profile::create($validated);

        return redirect(route('backend.users.profiles.show'))->with('message', 'Dodano');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();

        if ($user->profile == null) {
            return view('backend.user.profile.complete');
        }

        return view('backend.user.profile.show', ['item' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProfileRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $request->user()->profile->update($validated);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
