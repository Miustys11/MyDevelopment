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
        
        return view('goods.index', ['sub_categories' => $sub_categories]);
    }
    
    
    public function show(Request $request) {
        
        // Goods Modelからデータを取得する
        $goods = Goods::find($request->id);
  
        $like = $goods->likes()->where('user_id', Auth::user()->id)->first();
        
        // goodsを$goodsに置き換える
        // viewのほうでは$（ダラーマーク）がつく
        
        return view('goods.show', ['goods' => $goods, 'like' => $like]);
    }

    
   
   /**
    * 
    * カテゴリー画面表示
    * 
    */
   
   public function getSubCategory(Request $request) {
       

      $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $goods = Goods::where('sub_category_id', $request->sub_category_id)->where('name', "like", "%" . $cond_title . "%")->get();
        } else {
            // sub_category_idを取得
            $goods = Goods::where('sub_category_id', $request->sub_category_id)->get();
        }
      
    
      return view('goods.category', ['goods' => $goods,'cond_title' => $cond_title]);

   }
    
}
