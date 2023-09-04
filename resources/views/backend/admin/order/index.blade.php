<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Zamówienia</h2>
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
                                <x-table-header>orderable_id</x-table-header>
                                <x-table-header>orderable_type</x-table-header>
                                <x-table-header>Status</x-table-header>
                                {{-- <x-table-header>Koszt produktów</x-table-header> --}}
                                {{-- <x-table-header>Koszt dostawy</x-table-header> --}}
                                <x-table-header>Koszt</x-table-header>
                                {{-- <x-table-header>Dostawca</x-table-header> --}}
                            </tr>
                        </thead>
                        <tbody>
@foreach ($collection as $item)
                            <tr>                                
                                <x-table-data>
                                    <x-link href="{{ route('backend.admins.orders.show', $item) }}">
                                        {{ $item->id }}
                                    </x-link>
                                </x-table-data>
                                <x-table-data>{{ $item->orderable_id }}</x-table-data>
                                <x-table-data><small>{{ $item->orderable_type }}</small></x-table-data>
                                <x-table-data>{{ $item->status->name }}</x-table-data>
                                {{-- <x-table-data>{{ $item->total_price }}</x-table-data> --}}
                                {{-- <x-table-data>{{ $item->delivery_cost }}</x-table-data> --}}
                                <x-table-data>{{ $item->total_price_and_delivery_cost }}</x-table-data>
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
