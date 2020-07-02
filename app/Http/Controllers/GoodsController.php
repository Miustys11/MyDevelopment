<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Goods;
use App\SubCategory;

class GoodsController extends Controller
{

    public function index(Request $request) {
        
        $sub_categories = SubCategory::all();
        
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
        
        return view('goods.index', ['posts' => $posts, 'cond_title' => $cond_title, 'sub_categories' => $sub_categories]);
    }
    
    
    public function show(Request $request) {
        
        // Goods Modelからデータを取得する
        $goods = Goods::find($request->id);
        
        // goodsを$goodsに置き換える
        // viewのほうでは$（ダラーマーク）がつく
        
        return view('goods.show', ['goods' => $goods]);
    }
    
   
   /**
    * 
    * カテゴリー画面表示
    * 
    */
   
   public function getSubCategory(Request $request) {
       
      $goods = Goods::where('sub_category_id', $request->sub_category_id)->get();
    
      return view('goods.category', ['goods' => $goods]);
   }
    
}
