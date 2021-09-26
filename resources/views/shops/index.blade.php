@extends('layouts.main')

@section('title', 'Shop List')

@section('content')
    <h1>店舗一覧</h1>
    <ul>
        @foreach ($shops as $shop)
            <li>
                <a href="{{ route('shops.show', $shop) }}">
                    {{ $shop->name }}
                </a>
            </li>
        @endforeach
    </ul>
    {{-- Map --}}
    <div id="map" style="height: 50vh;"></div>
    <a href="{{ route('shops.create') }}">店舗登録</a>
@endsection

@section('script')
    @include('partial.map')
    <script>
        @if (!empty($shops))
            @foreach ($shops as $shop)
                L.marker([{{ $shop->latitude }},{{ $shop->longitude }}])
                .bindPopup('<a href="{{ route('shops.show', $shop) }}">{{ $shop->name }}</a>', {closeButton: false})
                .addTo(map);
            @endforeach
        @endif
    </script>
@endsection
