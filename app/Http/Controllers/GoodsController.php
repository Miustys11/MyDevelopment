<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;

class GoodsController extends Controller
{

    public function index(Request $request) {
        
        // すべてのアイテムを取得
        $posts = Goods::all();
        
        return view('goods.index', ['posts' => $posts]);
    }
    
    
    public function show(Request $request) {
        
        // Goods Modelからデータを取得する
        $goods = Goods::find($request->id);
        
        // goodsを$goodsに置き換える
        // viewのほうでは$（ダラーマーク）がつく
        
        return view('goods.show', ['goods' => $goods]);
    }
}
