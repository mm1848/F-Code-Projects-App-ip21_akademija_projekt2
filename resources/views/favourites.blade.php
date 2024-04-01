@extends('layouts.base')

@section('title', 'Favourite Currencies')

@section('body')
    <h1>Favourite Currencies</h1>
    <select id="favouriteCurrenciesDropdown">
        <option selected>&#9733;</option> <!-- star -->
        @foreach ($favourites as $currency)
            <option value="{{ $currency->currency_name }}">{{ $currency->currency_name }}</option>
        @endforeach
    </select>
    @include('select_currencies')
@endsection