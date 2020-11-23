@section('basket')
@if ($basket->productsCount() > 0)
            <div class="row mt-5 mb-3"><div class="col-sm text-center"><h2>koszyk</h2></div></div>
            <div class="row">
                <div class="col-sm mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">nazwa</th>
                                <th scope="col">pojemność</th>
                                <th scope="col">koncentracja</th>
                                <th scope="col">kategoria</th>
                                <th scope="col">cena</th>
                                <th scope="col">ilość</th>
                                <th scope="col">wartość</th>
                                <th scope="col">dodaj jeden</th>
                                <th scope="col">usuń jeden</th>
                            </tr>
                        </thead>
                        <tbody>
@foreach ($basket->getItems() as $item)
                            <tr>
                                <th scope="row">{{ $item->type_id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->type_name }}</td>
                                <td>{{ $item->concentration }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->subtotal_price, 2) }}</td>
                                <td>
                                    <form action="{{ route('frontend.basket.store', [$item->type_id]) }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-outline-primary btn-sm"> <i class="fas fa-plus"> </i> </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('frontend.basket.destroy', [$item->type_id]) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-outline-primary btn-sm"> <i class="fas fa-minus"> </i> </button>
                                    </form>
                                </td>
                            </tr>
@endforeach
                            <tr>
                                <td class="text-right" colspan="10">
                                    <strong>Produkty razem: {{ $basket->totalPrice() }} zł</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <a class="btn btn-outline-danger" href="{{ route('frontend.basket.remove') }}" role="button" title="usuwa cały koszyk">
                                        usuń koszyk <i class="fas fa-times"></i>
                                    </a>
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-outline-primary" href="{{ route('frontend.orders.cash.index') }}" role="button" title="do kasy">
                                        do kasy <i class="fas fa-arrow-right"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
@endif
@show
