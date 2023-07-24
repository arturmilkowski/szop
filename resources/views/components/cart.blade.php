<div class="px-2 my-12">
    <table>
        <thead>
            <tr>
                <x-table-header-data>#</x-table-header-data>
                <x-table-header-data>nazwa</x-table-header-data>
                <x-table-header-data>pojemność</x-table-header-data>
                <x-table-header-data>koncentracja</x-table-header-data>
                <x-table-header-data>kategoria</x-table-header-data>
                <x-table-header-data>cena</x-table-header-data>
                <x-table-header-data>ilość</x-table-header-data>
                <x-table-header-data>wartość</x-table-header-data>
                <x-table-header-data>dodaj jeden</x-table-header-data>
                <x-table-header-data>usuń jeden</x-table-header-data>
            </tr>
        </thead>
        <tbody>
@foreach ($cart->getItems() as $item)
            <tr>
                <x-table-data>{{ $item->type_id }}</x-table-data>
                <x-table-data>{{ $item->name }}</x-table-data>
                <x-table-data>{{ $item->type_name }}</x-table-data>
                <x-table-data>{{ $item->concentration }}</x-table-data>
                <x-table-data>{{ $item->category }}</x-table-data>
                <x-table-data>{{ $item->price }}</x-table-data>
                <x-table-data>{{ $item->quantity }}</x-table-data>
                <x-table-data>{{ number_format($item->subtotal_price, 2) }}</x-table-data>
                <x-table-data>
                    <form action="{{ route('cart.store', [$item->type_id]) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="">+</button>
                    </form>
                </x-table-data>
                <x-table-data>
                    <form action="{{ route('cart.destroy', [$item->type_id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="">-</button>
                    </form>
                </x-table-data>
            </tr>
@endforeach
            <tr>
                <x-table-data colspan="10">
                    Produkty razem: {{ $cart->totalPrice() }} zł
                </x-table-data>
            </tr>
        </tbody>
    </table>
    <table class="mt-2">
        <tbody>
            <tr>
                <td>
                    <a href="{{ route('cart.destroy.all') }}" title="usuwa cały koszyk">
                        usuń koszyk
                    </a>
                </td>
                <td>
                    <a href="{{ route('orders.checkout.index') }}" title="do kasy">
                        do kasy
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
