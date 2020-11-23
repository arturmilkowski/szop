zamówienie złożone

identyfikator zamówienia: {{ $order->number }}
data zamówienia: {{ $order->created_at }}
status zamówienia: {{ $order->status->display_name }}
wartość zamówienia: {{ $order->total_price }} zł
dostawa: {{ $order->delivery_name }}
koszt dostawy: {{ $order->delivery_cost }} zł
@if ($order->comment)
komentarz:
{{ $order->comment }}
@endif

zamówione produkty:
------------------------------------------------------------------------------
@foreach ($order->items as $item)
{{ $item->concentration }} {{ $item->name }}
kategoria: {{ $item->category }}
cena: {{ $item->price }}
ilość: {{ $item->quantity }}
wartość: {{ $item->subtotal_price }}
-----------------------------------------------------------------------------
@endforeach

dokument zakupu: {{ $order->saleDocument->display_name }}
do zapłaty: {{ number_format($order->total_price_and_delivery_cost, 2) }} zł
numer konta: {{ config('settings.account_number') }}
sposób zapłaty: {{ config('settings.delivery.methods_of_payment.prepayment') }}

dane firmy:
{{ config('settings.company_name') }}
{{ config('settings.company_address.street') }}
{{ config('settings.company_address.zip_code') }} {{ config('settings.company_address.city') }}
{{ config('settings.company_address.voivodeship') }}