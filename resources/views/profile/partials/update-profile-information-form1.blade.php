<section>
    {{-- <header>
        <h2 class="text-lg font-medium text-gray-900"></h2>
        <p class="mt-1 text-sm text-gray-600"></p>
    </header> --}}

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form method="post" action="{{ route('backend.users.profiles.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="surname" value="Nazwisko" />
            <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full" :value="old('surname', $user->profile->surname)" autocomplete="surname" />
            <x-input-error class="mt-2" :messages="$errors->get('surname')" />
        </div>

        <div>
            <x-input-label for="street" value="Ulica" />
            <x-text-input id="street" name="street" type="text" class="mt-1 block w-full" :value="old('street', $user->profile->street)" autocomplete="street" />
            <x-input-error class="mt-2" :messages="$errors->get('surname')" />
        </div>
        
        <div>
            <x-input-label for="zip_code" value="Kod pocztowy" />
            <x-text-input id="zip_code" name="zip_code" type="text" class="mt-1 block w-full" :value="old('zip_code', $user->profile->zip_code)" autocomplete="zip_code" />
            <x-input-error class="mt-2" :messages="$errors->get('zip_code')" />
        </div>

        <div>
            <x-input-label for="city" value="Miasto" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $user->profile->city)" autocomplete="city" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        <div>
            <x-input-label for="voivodeship_id" value="Województwo" />
            <x-select-input id="voivodeship_id" name="voivodeship_id">
                @foreach ($voivodeships as $voivodeship)
                @if ( old('voivodeship_id', $user->profile->voivodeship_id) == $voivodeship->id)
                    <option value="{{ $voivodeship->id }}" selected>{{ $voivodeship->name }}</option>
                @else
                    <option value="{{ $voivodeship->id }}">{{ $voivodeship->name }}</option>
                @endif
                @endforeach
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('voivodeship_id')" />
        </div>

        <div>
            <x-input-label for="phone" value="Telefon" />
            <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full" :value="old('phone', $user->profile->phone)" autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
