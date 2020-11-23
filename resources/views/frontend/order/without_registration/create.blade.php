@extends('frontend.layouts.app')

@section('title', 'zamówienie bez rejestracji')

@section('noindex')
<meta name="robots" content="noindex">
@endsection

@section('content')
            @include('frontend.includes.basket_no_edit')

            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <tbody>
                            <tr>                                
                                <td class="text-right">
                                    <strong>Do zapłaty: {{ number_format($totalPriceAndDeliveryCost, 2) }} zł</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-2 mb-3"><div class="col-sm text-center"><h2>dostawa</h2></div></div>
            <div class="row">
                <div class="col-sm mb-5">
                    @include('frontend.order.includes.delivery', ['deliveryName' => $deliveryName, 'deliveryCost' => $deliveryCost])
                </div>
            </div>
            
            <div class="row mt-2 mb-3"><div class="col-sm text-center"><h2>sposób płatności</h2></div></div>
            <div class="row">
                <div class="col-sm mb-5">
                    @include('frontend.order.includes.payment_method', ['methodOfPayment' => $methodOfPayment])
                </div>
            </div>

            <div class="row mt-2 mb-3"><div class="col-sm"><h1>zamówienie bez rejestracji</h1></div></div>
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('frontend.orders.without_registration.store') }}" method="POST" novalidate>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="name">imię</label>
                            <input class="form-control @error('name')is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}" minlength="3" maxlength="30" placeholder="pole obowiązkowe" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="lastname">nazwisko</label>
                            <input class="form-control @error('lastname')is-invalid @enderror" type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" minlength="3" maxlength="30" placeholder="pole obowiązkowe" required>
                            @error('lastname')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="lastname">ulica i numer mieszkania</label>
                            <input class="form-control @error('street')is-invalid @enderror" type="text" id="street" name="street" value="{{ old('street') }}" minlength="3" maxlength="60" placeholder="pole obowiązkowe" required>
                            @error('street')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="zip_code">kod pocztowy</label>
                            <input class="form-control @error('zip_code')is-invalid @enderror" type="text" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" pattern="^[0-9]{2}-[0-9]{3}$" size="6" placeholder="pole obowiązkowe" required>
                            @error('zip_code')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="city">miasto</label>
                            <input class="form-control @error('city')is-invalid @enderror" type="text" id="city" name="city" value="{{ old('city') }}"  placeholder="pole obowiązkowe" minlength="3" maxlength="60" required>
                            @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="voivodeship_id">województwo</label>
                            <select class="form-control @error('voivodeship_id')is-invalid @enderror" id="voivodeship_id" name="voivodeship_id" required>
@foreach ($voivodeships as $voivodeship)
@if (old('voivodeship_id') == $voivodeship->id)
                                <option value="{{ $voivodeship->id }}" selected>{{ $voivodeship->name }}</option>
@else
                                <option value="{{ $voivodeship->id }}">{{ $voivodeship->name }}</option>
@endif
@endforeach
                            </select>
                            @error('voivodeship_id')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="email">email</label>
                            <input class="form-control @error('email')is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" minlength="5" maxlength="30" placeholder="pole obowiązkowe" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="phone">telefon</label>
                            <input class="form-control @error('phone')is-invalid @enderror" type="tel" id="phone" name="phone" value="{{ old('phone') }}" size="9" placeholder="pole nieobowiązkowe">
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="comment">komemtarz do zamówienia</label>
                            <textarea class="form-control" id="comment" name="comment" maxlength="1000" rows="3" placeholder="pole nieobowiązkowe">{{ old('comment') }}</textarea>
                            @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                                                
                        <div class="form-group">
                            @include('frontend.order.includes.sale_document', ['saleDocuments' => $saleDocuments ])
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input @error('term')is-invalid @enderror" id="term" name="term" value="term" @if (old('term')) checked @endif>
                            <label class="form-check-label" for="term">akceptuję regulamin</label>
                            @error('term')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        
                        <button type="submit" class="btn btn-primary mt-3">wyślij zamówienie <i class="fas fa-paper-plane"></i></button>                        
                    </form>
                </div>
            </div>
@endsection
