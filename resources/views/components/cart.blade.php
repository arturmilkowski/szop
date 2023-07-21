<div>
    <table class="cart">
        <thead>
            <tr>
                <th>#</th>
                <th>nazwa</th>
                <th>pojemność</th>
                <th>koncentracja</th>
                <th>kategoria</th>
                <th>cena</th>
                <th>ilość</th>
                <th>wartość</th>
                <th>dodaj jeden</th>
                <th>usuń jeden</th>
            </tr>
        </thead>
        <tbody>
@foreach ($cart->getItems() as $item)
            <tr>
                <td>{{ $item->type_id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->type_name }}</td>
                <td>{{ $item->concentration }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->subtotal_price, 2) }}</td>
                <td>
                    <form action="{{ route('cart.store', [$item->type_id]) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="">+</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('cart.destroy', [$item->type_id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="">-</button>
                    </form>
                </td>
            </tr>
@endforeach
            <tr>
                <td class="" colspan="10">
                    Produkty razem: {{ $cart->totalPrice() }} zł
                </td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td>
                    <a href="{{ route('cart.destroy.all') }}" title="usuwa cały koszyk">
                        usuń koszyk
                    </a>
                </td>
                <td>
                    <a href="{{-- route('orders.checkout.index') --}}" title="do kasy">
                        do kasy
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
