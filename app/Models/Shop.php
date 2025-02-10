<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    // ShopモデルにCategoryモデルをリレーション
    // $thisはShopクラスのインスタンスを指しており、Shopクラスのメソッドやプロパティにアクセスするために使用
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    
}
