@extends('frontend.layouts.app')

@section('title', 'o firmie')
@section('description', 'zapachy zacząłem tworzyć w 2011 roku. po dziewięciu latach zdecydowałem się je zaprezentować w sieci.')
@section('keywords', 'tworzenie zapachów, tworzenie perfum, rękodzieło, naturalna woda kolońska')

@section('content')
            <div class="row mt-5 mb-3"><div class="col-sm"><h1>o firmie</h1></div></div>
            <div class="row">
                <div class="col-sm">
                    <div class="card my-card">
                        <div class="card-body">
                            <h2 class="card-title">zapachy zacząłem tworzyć w 2011 roku</h2>
                            <p class="card-text mt-4">
                                najpierw dla siebie i znajomych. po dziewięciu latach zdecydowałem się zaprezentować je szerzej.
                                brakowało mi na rynku wód kolońskich i toaletowych, które są świeże, naturalne, lekkie i pozostają takie do końca trwania zapachu.
                                nużyły mnie wonie syntetyczne i słodkie, stanowiące większość na półkach sklepowych.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card my-card">
                        <div class="card-body">
                            <h2 class="card-title">prowadzę działalność nierejestrowaną</h2>
                            <p class="card-text mt-4">
                                nie płacę vat, nie posiadam numeru nip.
                                dowodem zakupu jest rachunek, domyślnie, w postaci elektronicznej, dostępny w panelu administracyjnym, który można wydrukować.
                                rachunek papierowy lub fakturę (bez vat) drukuję na wyraźną prośbę, po zaznaczeniu odpowiedniego pola podczas składania zamówienia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
@endsection
