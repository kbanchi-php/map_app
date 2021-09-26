@extends('layouts.main')

@section('title', 'Shop Info Edit')

@section('content')
    <h1>店舗情報修正</h1>
    <form>
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
    </form>
    <a href="{{ route('shops.index') }}">一覧画面</a>
    <a href="{{ route('shops.edit', $shop) }}">編集</a>
    <form action="{{ route('shops.destroy', $shop) }}" method="post" name="form1" style="display: inline">
        @csrf
        @method('delete')
        <button type="submit" onclick="if(!confirm('削除していいですか?')){return false}">削除する</button>
    </form>
@endsection
