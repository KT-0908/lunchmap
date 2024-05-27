@extends('layout')

@section('content')
    <h1>{{ $shop->name }}を編集する</h1>
    <form action="{{ route('shop.update', ['id' => $shop->id]) }}" method="POST" >
        @csrf
        @method('PUT')

        <div class='form-group'>
            <label for="name">店名:</label>
            <input id="name" type="text" name="name" value="{{ old('name', $shop->name) }}" class="form-control">
        </div>

        <div class='form-group'>
            <label for="address">住所:</label>
            <input id="address" type="text" name="address" value="{{ old('address', $shop->address) }}" class="form-control">
        </div>

        <div class='form-group'>
            <label for="category_id">カテゴリ:</label>
            <select id="category_id" name="category_id" class="form-control">
                @foreach($categories as $categoryId => $categoryName)
                    <option value="{{ $categoryId }}" {{ $shop->category_id == $categoryId ? 'selected' : '' }}>
                        {{ $categoryName }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary">更新する</button>
        </div>
    </form>

    <div>
        <a href="{{ route('shop.list') }}">一覧に戻る</a>
    </div>
@endsection
