<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Goods;
use App\SubCategory;
use App\GoodsView;

class GoodsController extends Controller
{

    public function index(Request $request) {
        
        $sub_categories = SubCategory::all();

        // goodsViewを降順に並べる
        $goods_ranking = Goods::withCount('goods_views')->orderBy('goods_views_count', 'DESC')->limit(8)->get();



        return view('goods.index', ['sub_categories' => $sub_categories, 'goods_ranking' => $goods_ranking]);
    }
    
    
    public function show(Request $request) {
        
        // Goods Modelからデータを取得する
        $goods = Goods::find($request->id);

        // 現在認証されているユーザーのIDを取得
        $user_id = Auth::guard('user')->id();
  
        //ログインしているアカウントでいいね済みかどうかの判定用
        // $like = $goods->likes()->where('user_id', Auth::user()->id)->first();
        $like = $goods->likes()->where('user_id', $user_id)->first();

        // -- ランキング機能 --
        // 商品詳細を閲覧したと同時にレコードが作られる

        if (Auth::guard('user')->check()) {
        // レコードが作られる
          GoodsView::firstOrCreate(
              [
                'user_id' => $user_id,
                'goods_id' => $goods->id
              ]
          );
        }

        // Goods の sub_category_id を取得
        $goods_recommends = Goods::where([
          ['sub_category_id', $goods->sub_category_id],
          ['id', '<>', $goods->id]
        ])->limit(5)->get();

        // goodsを$goodsに置き換える
        // viewのほうでは$（ダラーマーク）がつく

        return view('goods.show', ['goods' => $goods, 'like' => $like, 'goods_recommends' => $goods_recommends]);
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
