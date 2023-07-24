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
            </tr>
@endforeach
            <tr>
                <td colspan="10">
                    Produkty razem: {{ $cart->totalPrice() }} zł
                </td>
            </tr>
        </tbody>
    </table>    
</div>
