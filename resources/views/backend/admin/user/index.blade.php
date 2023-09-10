<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Użytkownicy sklepu &mdash; osoby, które się zarejestrowały</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-3">
                        <x-link href="{{-- route('backend.admins.orders.create') --}}">Dodaj</x-link>
                    </p>
@if ($collection->count())
                    <table class="w-full">
                        <thead>
                            <tr>
                                <x-table-header>#</x-table-header>
                                <x-table-header>Imię i nazwisko</x-table-header>
                                <x-table-header>E-mail</x-table-header>
                                <x-table-header>Telefon</x-table-header>
                                <x-table-header>Miasto</x-table-header>
                                <x-table-header>Utworzono</x-table-header>
                            </tr>
                        </thead>
                        <tbody>
@foreach ($collection as $item)
                            <tr>                                
                                <x-table-data>{{ $item->id }}</x-table-data>
                                <x-table-data>
                                    <x-link href="{{ route('backend.admins.users.show', $item) }}">
                                        {{ $item->name }} {{ $item->profile->surname ?? ''}}
                                    </x-link>
                                </x-table-data>
                                <x-table-data>{{ $item->email }}</x-table-data>
                                <x-table-data>{{ $item->profile->phone ?? '-'}}</x-table-data>
                                <x-table-data>{{ $item->profile->city ?? '-'}}</x-table-data>                                
                                <x-table-data>{{ $item->created_at }}</x-table-data>
                                {{-- <x-table-data>{{ $item->total_price }}</x-table-data> --}}
                                {{-- <x-table-data>{{ $item->delivery_cost }}</x-table-data> --}}
                                {{-- <x-table-data>{{ $item->total_price_and_delivery_cost }}</x-table-data> --}}
                                {{-- <x-table-data>{{ $item->delivery_name }}</x-table-data> --}}                                    
                            </tr>
@endforeach
                        </tbody>
                    </table>
@else
                    <div>Brak danych</div>
@endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>