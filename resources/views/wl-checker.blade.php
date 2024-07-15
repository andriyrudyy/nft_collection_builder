@extends('layouts.app')

@section('title', 'NFT collection white list checker')

@section('content')
    <div class="logo">
        <img src="{{url('/images/logo.png')}}" alt="Logo" width="360">
    </div>

    <form class="wallet-check" action="/wl-checker" method="POST">
        @csrf
        <div class="wallet-check__input-group">
            <input
                value="{{ $wallet ?? '' }}"
                autocomplete="off"
                type="text"
                name="wallet"
                placeholder="Wallet address"
                aria-label="Wallet address"
                required
            >
            <button type="submit">Check</button>
        </div>
    </form>

    @isset($result)
        <p class="search-result">{{ $result }}</p>
    @endisset
@endsection

@section('styles')
    @vite('resources/css/home.css')
@endsection
