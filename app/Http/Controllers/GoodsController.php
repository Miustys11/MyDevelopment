<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;

class GoodsController extends Controller
{

    public function index(Request $request) {
        
        // すべてのアイテムを取得
        // $posts = Goods::all();
        
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Goods::where('name', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Goods::all();
        }
        
        return view('goods.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    
    public function show(Request $request) {
        
        // Goods Modelからデータを取得する
        $goods = Goods::find($request->id);
        
        // goodsを$goodsに置き換える
        // viewのほうでは$（ダラーマーク）がつく
        
        return view('goods.show', ['goods' => $goods]);
    }
    
    
}
