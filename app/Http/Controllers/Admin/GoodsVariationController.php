<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\GoodsVariation;
use App\Goods;

class GoodsVariationController extends Controller
{
    
    // GoodsVariationの一覧
    public function index(Request $request) {
        
        $variations = GoodsVariation::all();
        
        return view('admin.goods.variation.index',['variations' => $variations]);
        
    }
    
    // GoodsVariationの編集画面
    public function edit(Request $request) {
        
        // GoodsVariation Model から id を取得
        $variations = GoodsVariation::find($request->id);

        $form = $request->all();

        // もし $variations が空だったら 404のページを表示
        if (empty($variations)) {
            abort(404);
        }
        
        return view('admin.goods.variation.edit',['variations' => $variations, 'form' => $form]);
        
    }
    
    public function update(Request $request) {
        
        // Validationをかける
        $this->validate($request, GoodsVariation::$rules);
        
        // GoodsVariation Modelからデータを取得する
        $variations = GoodsVariation::find($request->id);
        
        // 送信されてきたフォームデータを格納する
        $form = $request->all();
        
        // 以下を $form に格納
        $variations->goods_id = $form['goods_id'];
        $variations->size = $form['size'];
        $variations->color = $form['color'];
        $variations->price = $form['price'];
        $variations->stock = $form['stock'];
        
        
        // unset($form['_token']);
        
        // 該当するデータを上書きして保存する
        $variations->fill($form)->save();
        
        return redirect('admin/goods/variation');
    }
    
    public function delete(Request $request) {
      
        // 該当するGoods Modelを取得
        $variations= GoodsVariation::find($request->id);
      
        // 削除する
        $variations->delete();
      
        return redirect('admin/goods/variation');
    }
}
