<x-layout>
    <x-slot:title>Zamówienie</x-slot>
    <x-header-one>Zamówienie</x-header-one>
    <div class="mx-2">
        <table>
            <tbody>
                <tr>
                    <x-table-data>Imię</x-table-data>
                    <x-table-data>{{ $user->name }}</x-table-data>
                </tr>
                <tr>
                    <x-table-data>Nazwisko</x-table-data>
                    <x-table-data>{{ $user->profile->surname }}</x-table-data>
                </tr>
                <tr>
                    <x-table-data>E-mail</x-table-data>
                    <x-table-data>{{ $user->email }}</x-table-data>
                </tr>
                <tr>
                    <x-table-data>Telefon</x-table-data>
                    <x-table-data>{{ $user->profile->phone }}</x-table-data>
                </tr>
                <tr>
                    <x-table-data>Ulica</x-table-data>
                    <x-table-data>{{ $user->profile->street }}</x-table-data>
                </tr>
                <tr>
                    <x-table-data>Kod pocztowy</x-table-data>
                    <x-table-data>{{ $user->profile->zip_code }}</x-table-data>
                </tr>
                <tr>
                    <x-table-data>Miasto</x-table-data>
                    <x-table-data>{{ $user->profile->city }}</x-table-data>
                </tr>
                <tr>
                    <x-table-data>Województwo</x-table-data>
                    <x-table-data>{{ $user->profile->voivodeship->name }}</x-table-data>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mx-2 mt-4">
        <table>
            <tbody>
                <tr>
                    <x-table-data>Dostawa</x-table-data>
                    <x-table-data>{{ $deliveryName }}</x-table-data>
                </tr>
                <tr>
                    <x-table-data>Sposób dostawy</x-table-data>
                    <x-table-data>{{ $deliveryMethod }}</x-table-data>
                </tr>
                <tr>
                    <x-table-data>Koszt dostawy</x-table-data>
                    <x-table-data>{{ $deliveryCost }}</x-table-data>
                </tr>
                <tr>
                    <x-table-data>Koszt zamówienia wraz z dostawą</x-table-data>
                    <x-table-data>{{ $totalPriceAndDeliveryCost }}</x-table-data>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mx-2 mt-4">
        <form action="{{ route('orders.with-registration.store') }}" method="POST" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div>
                @foreach ($saleDocuments as $document)
                            <div>
                                <input type="radio" name="sale_document_id" id="{{ $document->name }}" value="{{ $document->id }}" @if ($document->name == 'Brak') checked @endif @if (old('sale_document_id') == $document->id) checked @endif>
                                <label for="{{ $document->name }}">{{ $document->description }}</label>
                            </div>
                @endforeach
                        </div>
                        <div class="form-group">
                            <label for="comment">Komentarz do zamówienia</label>
                            <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" maxlength="1000" rows="3" placeholder="komentarz do zamówienia">{{ old('comment') }}</textarea>
                            @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
    
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input @error('term')is-invalid @enderror" id="term" name="term" value="term" @if (old('term')) checked @endif>
                            <label class="form-check-label" for="term">Akceptuję regulamin</label>
                            @error('term')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
            <a href="{{ route('orders.checkout.index') }}">Powrót do kasy</a> | 
            <button type="submit">Wyślij zamówienie</button>
        </form>
    </div>
</x-layout>
