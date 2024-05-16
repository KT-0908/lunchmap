<?php

use Illuminate\Support\Facades\Route;
// 追加
use App\Http\Controllers\ShopController;

// Route::get('/shops', 'ShopController@index')->name('shop.list');
// 講座のコードが古かったため下記に修正
Route::get('/shops', [ShopController::class,'index'])->name('shop.list');

// ▼useでコントローラーをインポートしない場合は完全修飾名でコントローラーを指定
// Route::get('/shops', 'App\Http\Controllers\ShopController@index')->name('shop.list');


Route::get('/', function () {
    return redirect('/shops');
});
