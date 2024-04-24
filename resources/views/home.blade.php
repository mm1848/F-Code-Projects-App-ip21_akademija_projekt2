@extends('layouts.base')

@section('body')
    <div id="favourites">
        @include('favourites', ['favourites' => $favourites])
    </div>
    <div id="currencies">
        @include('select_currencies', ['currencies' => $currencies['data'] ?? []])
    </div>
@endsection