@extends('layouts.base')

@section('body')
    <h1>Crypto Prices</h1>
    <form id="priceForm" action="{{ route('show.price') }}" method="GET">
        <div class="select-container">
            <!-- STAR BUTTON 1 -->
            <div class="favorite-btn-container">
                <button type="button" id="favoriteBaseCurrency" class="favorite-btn"><i class="far fa-star"></i></button>
                <select name="base_currency" id="base_currency">
                @foreach ($currencies as $currency)
                    @if(is_array($currency) && isset($currency['id']) && isset($currency['name']))
                        <option value="{{ $currency['id'] }}">{{ $currency['id'] }} - {{ $currency['name'] }}</option>
                    @endif
                @endforeach
                </select>
            </div>
            
            <!-- STAR BUTTON 2 -->
            <div class="favorite-btn-container">
                <button type="button" id="favoriteQuoteCurrency" class="favorite-btn"><i class="far fa-star"></i></button>
                <select name="quote_currency" id="quote_currency">
                @foreach ($currencies as $currency)
                    @if(is_array($currency) && isset($currency['id']) && isset($currency['name']))
                        <option value="{{ $currency['id'] }}">{{ $currency['id'] }} - {{ $currency['name'] }}</option>
                    @endif
                @endforeach
                </select>
            </div>
        </div>
        <button id="showPriceButton" type="submit">Show Price</button>
    </form>

    <div id="priceResult" class="price-result"></div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    
@endsection