@extends('layout')

@section('content')
<h1>{{ $shop->name }}</h1>
<div>
    <p>{{ $shop->category->name }}</p>
    <p>{{ $shop->address }}</p>
</div>

<iframe id='map' src='https://www.google.com/maps/embed/v1/place?key=AIzaSyCJBgcuCowQa5-V8owXaUCHhUNBN8bfMfU&amp;q={{ $shop->address }}'
    width='100%'
    height='320'
    frameborder='0'>
</iframe>

<div>
    <a href={{ route('shop.list')}}>一覧に戻る</a>
    @auth
    @if ($shop->user_id === $login_user_id)
    | <a href={{ route('shop.edit', ['id' => $shop->id]) }}>編集</a>
    <p></p>
    <form method="POST" action="{{ route('shop.destroy', ['id' => $shop->id]) }}"
        onsubmit="return confirm('本当に削除しますか？')">
        @csrf
        @method('DELETE')
        <button type="submit">削除</button>
    </form>
    @endif
    @endauth
</div>
@endsection