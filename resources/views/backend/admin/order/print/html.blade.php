<!doctype html>
<html lang="pl">
    <head>    
        <meta charset="utf-8">
        <title>zamówienie numer {{ $order->number }}</title>
        <link rel="stylesheet" href="{{ asset('css/backend/print.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="dealer">
            <div>sprzedawca</div>
            <table>
                <tbody>
                    <tr><td>{{ config('settings.company_name') }}</td></tr>
                    <tr><td>{{ config('settings.company_address.street') }}</td></tr>
                    <tr>
                        <td>
                            {{ config('settings.company_address.zip_code') }}
                            {{ config('settings.company_address.city') }}
                        </td>
                    </tr>
                    <tr><td>{{ config('settings.company_address.voivodeship') }}</td></tr>
                    <tr><td>telefon: {{ config('settings.company_address.phone') }}</td></tr>
                    <tr><td>data wystawienia: {{ date('Y-m-d') }}</td></tr>
                </tbody>
            </table>
        </div>
        <div class="buyer">
            <div>nabywca</div>
            <table>
                <tbody>
                    <tr><td>{{ $order->orderable->name }} {{ $order->orderable->profile->lastname }}</td></tr>
                    <tr><td>{{ $order->orderable->profile->street }}</td></tr>
                    <tr>
                        <td>
                            {{ $order->orderable->profile->zip_code }}
                            {{ $order->orderable->profile->city }}
                        </td>
                    </tr>
                    <tr><td>{{ $order->orderable->profile->voivodeship->name }}</td></tr>
                </tbody>
            </table>
        </div>
        <div class="break"></div>
        <div class="text-center mt">
            {{ $header }}.
            zamówienie numer: {{ $order->number }}.
            data sprzedaży: {{ $createdAt }}
        </div>
        <div class="items mt">
            <div class="text-center">produkty</div>
            <table>
@foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category }} {{ $item->concentration }}</td>
                    <td>{{ $item->type_name }}</td>
                    <td>{{ $item->price }} zł</td>
                    <td>{{ $item->quantity }} szt.</td>
                    <td>{{ $item->subtotal_price }} zł</td>
                </tr>
@endforeach
                <tr>
                    <td class="text-right" colspan="5">produkty razem:</td><td>{{ $order->total_price }} zł</td>
                </tr>
                <tr>
                    <td class="text-right" colspan="5">koszy dostawy:</td><td>{{ $order->delivery_cost }} zł</td>
                </tr>
                <tr>
                    <td class="text-right last" colspan="5"><strong>należność ogółem:</strong></td><td class="last"><strong>{{ $order->total_price_and_delivery_cost }} zł</strong></td>
                </tr>
            </table>
        </div>
    </body>
</html>
