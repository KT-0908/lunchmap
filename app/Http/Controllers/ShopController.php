<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::all();
        return view('index', ['shops' => $shops]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // pluckは必要なカラムのデータだけ取り出せるメソッド
        // pluckは第二引数を取ることができ、pluck(valueにしたい値, keyにしたい値)という仕組みになっています
        // Category モデルから全データを取得し、pluckで 'name' を value に、'id' を key にする
        $categories = Category::all()->pluck('name', 'id');

        // new ビューに categories を渡す
        return view('new', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // 保存機能
    public function store(Request $request)
    {
        $shop = new Shop;
        // ↓ログインしているユーザー情報を取得
        $user = \Auth::user();

        // フォームから送信された name, address, category_id を取得し、$shop にセット。
        $shop->name = request('name');
        $shop->address = request('address');
        $shop->category_id = request('category_id');
        // ↓ログインしているユーザーのidを保存
        $shop->user_id = $user->id;
        $shop->save();

        // ['id' => $shop->id] で新しく作成した shop の ID を渡す。
        return redirect()->route('shop.detail', ['id' => $shop->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $shop = Shop::find($id);
        $user = \Auth::user();
        if ($user) {
            $login_user_id = $user->id;
        } else {
            $login_user_id = "";
        }
        
        return view('show', ['shop' => $shop, 'login_user_id' => $login_user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Shop モデルを使って、id に一致するレコードをデータベースから取得
        $shop = Shop::find($id);
        // Category モデルから全データを取得し、pluckで 'name' を value に、'id' を key にする
        $categories = Category::all()->pluck('name', 'id');
        // edit ビューに shop と categories を渡す
        // edit.blade.php に $shop（編集する店舗情報）と $categories（カテゴリ一覧）を渡す。
        return view('edit', ['shop' => $shop, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, Shop $shop)
    {
        $shop = Shop::find($id);
        $shop->name = request('name');
        $shop->address = request('address');
        $shop->category_id = request('category_id');
        $shop->save();
        return redirect()->route('shop.detail', ['id' => $shop->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $shop = Shop::find($id);
        $shop->delete();
        return redirect('/shops');
    }
}
