@extends('layout')

@section('content')
    <h1>新しいお店</h1>
    <form action="{{ route('shop.store') }}" method="POST">
        @csrf
        <div class='form-group'>
            <label for="name">店名:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class='form-group'>
            <label for="address">住所:</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class='form-group'>
            <label for="category_id">カテゴリ:</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $id => $category)
                    <option value="{{ $id }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary">作成する</button>
        </div>
    </form>

    <div>
        <a href="{{ route('shop.list') }}">一覧に戻る</a>
    </div>
@endsection
