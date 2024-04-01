@extends('layouts.base')

@section('title', 'List of Currencies')

@section('body')
    <h1>List of Currencies</h1>
    <ul>
        @foreach ($currencies as $currency)
            <li>{{ $loop->index + 1 }}. <strong>{{ $currency->id }}</strong> - {{ $currency->name }}</li>
        @endforeach
    </ul>
@endsection