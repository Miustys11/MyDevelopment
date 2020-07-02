<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\GoodsVariation;

class GoodsVariationController extends Controller
{
    
    public function add() {
        
        return view('admin.goods.variation.create');
    }
    
    public function create(Request $request) {
        
        // Varidationを行う
        $this->validate($request, GoodsVariation::$rules);
        
        $variations = new GoodsVariation;
        $form = $request->all();

        $variations->goods_id = $form['goods_id'];
        $variations->size = $form['size'];
        $variations->color = $form['color'];
        $variations->price = $form['price'];
        $variations->stock = $form['stock'];
        
      
        // データベースに保存する
        $variations->fill($form);
        $variations->save();
      
      
        return redirect('admin/goods/variation/create');
    }
    
    public function index(Request $request) {
        
        $variations = GoodsVariation::all();
        
        return view('admin.goods.variation.index');
        
    }
    
    public function edit(Request $request) {
        
        // GoodsVariation Model からデータを取得
        $variations = GoodsVariation::find($request->id);
        
        if (empty($goodsVariations)) {
            abort(404);
        }
        
        return view('admin.goods.variation.edit');
        
    }
    
    public function update(Request $request) {
        
        // Validationをかける
        $this->validate($request, GoodsVariation::$rules);
        
        // GoodsVariation Modelからデータを取得する
        $variations = GoodsVariation::find($request->id);
        
        // 送信されてきたフォームデータを格納する
        $form = $request->all();
        
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
