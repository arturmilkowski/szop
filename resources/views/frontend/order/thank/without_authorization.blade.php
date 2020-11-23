@extends('frontend.layouts.app')

@section('title', 'dziękuję za zamówienie bez rejestracji')

@section('noindex')
<meta name="robots" content="noindex">
@endsection

@section('content')
            <div class="row mt-5 mb-3"><div class="col-sm"><h1>dziękuję za zamówienie (bez rejestracji)</h1></div></div>
            <div class="row mb-3"><div class="col-sm text-center"><h2>podsumowanie</h2></div></div>
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">numer zamówienia (podaj jako tytuł przelewu)</th>
                                <td>{{ $number }}</td>
                            </tr>
                            <tr>
                                <th scope="row">numer konta</th>
                                <td>{{ config('settings.account_number') }}</td>
                            </tr>
                            <tr>
                                <th scope="row">do zapłaty (w tym koszt przesyłki)</th>
                                <td>{{ number_format($total_price_and_delivery_cost, 2) }} zł</td>
                            </tr>
                            <tr>
                                <th scope="row">sposób płatności</th>
                                <td>{{ $methodOfPayment }}</td>
                            </tr>
                            <tr>
                                <th scope="row">dokument zakupu:</th>
                                <td>{{ $sale_document }}</td>
                            </tr>
                            <tr>
                                <th scope="row">przesyłka</th>
                                <td>{{ $delivery_name }}. Koszt {{ $delivery_cost }} zł</td>
                            </tr>
                            <tr>
                                <th scope="row">dane firmy</th>
                                <td>
                                    <ul class="list-unstyled">
                                        <li>{{ config('settings.company_name') }}</li>
                                        <li>{{ config('settings.company_address.street') }}</li>
                                        <li>
                                            {{ config('settings.company_address.zip_code') }} 
                                            {{ config('settings.company_address.city') }}
                                        </li>
                                        <li>{{ config('settings.company_address.voivodeship') }}</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">dostawa na adres</th>
                                <td>
                                    <ul class="list-unstyled">
                                        <li>{{ $name }} {{ $lastname }}</li>
                                        <li>{{ $street }}</li>
                                        <li>{{ $zip_code }} {{ $city }}</li>
                                        <li>{{ $voivodeship }}</li>
@if ($phone)
                                        <li>tel: {{ $phone }}</li>
@endif
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <a href="{{ route('frontend.pages.index') }}" title="strona główna"><i class="fas fa-home"></i> strona główna</a>
                </div>
            </div>
@endsection
