@extends('layout')

@section('content')
<h1>お店一覧</h1>

<table class='table table-striped table-hover'>
    <tr>
        <th>カテゴリ</th>
        <th>記事名</th>
        <th>内容</th>
    </tr>
    @foreach ($shops as $shop)
        <tr>
            <td>{{ $shop->category->name }}</td>
            <td><a href={{ route('shop.detail', ['id' => $shop->id]) }}>{{ $shop->name }}
                </a>
            </td>
            <td>{{ $shop->address }}</td>
        </tr>
    @endforeach
</table>

<div>
        <a href={{ route('shop.new') }} class='btn btn-outline-primary'>新しいお店</a>
    <div>
@endsection