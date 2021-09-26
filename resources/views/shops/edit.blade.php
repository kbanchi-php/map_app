@extends('layouts.main')

@section('title', 'Shop Info Edit')

@section('content')
    <h1>店舗情報修正</h1>
    <form action="{{ route('shops.update', $shop) }}" method="post">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">店舗名:</label>
            <input type="text" name="name" id="name" value="{{ $shop->name }}">
        </div>
        <div>
            <label for="description">詳細:</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ $shop->description }}</textarea>
        </div>
        <div>
            <label for="address">住所:</label>
            <input type="text" name="address" id="address" value="{{ $shop->address }}">
        </div>
        <a href="{{ route('shops.index') }}">一覧画面</a>
        <input type="submit" value="更新する">
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">
    </form>
    <form action="{{ route('shops.destroy', $shop) }}" method="post" name="form1" style="display: inline">
        @csrf
        @method('delete')
        <button type="submit" onclick="if(!confirm('削除していいですか?')){return false}">削除する</button>
    </form>
    {{-- Map --}}
    <div id="map" style="height: 50vh;"></div>
@endsection

@section('script')
    @include('partial.map')
    <script>
        const lat = document.getElementById('latitude');
        const lng = document.getElementById('longitude');
        @if (!empty($shop))
            const marker = L.marker([{{ $shop->latitude }}, {{ $shop->longitude }}], {
            draggable: true
            }).bindPopup("{{ $shop->name }}", {closeButton: false}).addTo(map);
            lat.value = {{ $shop->latitude }};
            lng.value = {{ $shop->longitude }};
            marker.on('dragend', function(e) {
            // 座標は、e.target.getLatLng()で取得
            lat.value = e.target.getLatLng()['lat'];
            lng.value = e.target.getLatLng()['lng'];
            });
        @endif
    </script>
@endsection
