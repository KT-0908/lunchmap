@extends('layout')

@section('content')
<h1>{{ $shop->name }}</h1>
<div>
    <p>{{ $shop->category->name }}</p>
    <p>{{ $shop->address }}</p>
</div>

<div>
    <a href={{ route('shop.list')}}>一覧に戻る</a>
    | <a href={{ route('shop.edit', ['id' => $shop->id]) }}>編集</a>
    <p></p>
    <form method="POST" action="{{ route('shop.destroy', ['id' => $shop->id]) }}" onsubmit="return confirm('本当に削除しますか？')">
    @csrf
    @method('DELETE')

    <button type="submit">削除</button>
</form>


</div>
@endsection