<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Like;
use Auth;
use App\Goods;

class LikesController extends Controller
{
    public function store(Request $request, $goodsId)
    {
        Like::create(
          array(
            'user_id' => Auth::user()->id,
            'goods_id' => $goodsId
          )
        );

        $goods = Goods::findOrFail($goodsId);

        return redirect()
             ->action('GoodsController@show', $goods->id);
    }

    public function destroy(Request $request, $goodsId, $likeId) {

      $goods = Goods::findOrFail($goodsId);
      $goods->like_by()->findOrFail($likeId)->delete();

      return redirect()
             ->action('GoodsController@show', $goods->id);
    }

    public function store_ajax(Request $request, $goodsId)
    {
        Like::firstOrCreate(
          [
            'user_id' => Auth::user()->id,
            'goods_id' => $goodsId
          ]
        );

        $goods = Goods::where('id', $goodsId)->withCount('likes')->first();

        return response()->json([
            'goods' => $goods
         ]);
    }

    public function destroy_ajax(Request $request, $goodsId) {

      Like::where('user_id', Auth::user()->id)
        ->where('goods_id', $goodsId)
        ->delete();
      $goods = Goods::where('id', $goodsId)->withCount('likes')->first();

      return response()->json([
        'goods' => $goods
     ]);
    
    }
}
