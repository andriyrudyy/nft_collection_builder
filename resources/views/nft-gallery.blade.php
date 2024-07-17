@extends('layouts.app')

@section('title', 'NFT Gallery')

@section('content')
    <div class="page-header">
        <h2>NFT Gallery</h2>
    </div>
    <div class="nft-gallery">
        @foreach ($images as $image)
            <img src="/gallery/{{$image}}" loading="lazy" width="300" height="300" />
        @endforeach
    </div>
@endsection

@section('styles')
    @vite('resources/css/nft-gallery.css')
@endsection
