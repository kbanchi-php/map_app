@extends('layouts.main')

@section('title', 'Shop List')

@section('content')
    <h1>店舗一覧</h1>
    <ul>
        @foreach ($shops as $shop)
            <li><a href="{{ route('shops.show', $shop) }}">{{ $shop->name }}</a></li>
        @endforeach
    </ul>
    <a href="{{ route('shops.create') }}">create</a>
@endsection
