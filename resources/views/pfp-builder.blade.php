@extends('layouts.app')

@section('title', 'NFT collection profile picture builder')

@section('content')
    <div class="pfp-builder">
        <canvas id="pfp-builder" width="500" height="500"></canvas>
        <div class="builder-options">
        @foreach ($dropdowns as $dropdown)
            <div>
                <label>{{ucfirst($dropdown->name)}}</label>
                <select name="{{$dropdown->name}}">
                    @foreach ($dropdown->items as $key => $item)
                        <option {{ $key === $dropdown->selected ? 'selected' : '' }} value="{{$item}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
        @endforeach
        </div>
    </div>
@endsection

@section('styles')
    @vite('resources/css/pfp-builder.css')
@endsection

@section('scripts')
    @vite('resources/js/pfp-builder.js')
@endsection
