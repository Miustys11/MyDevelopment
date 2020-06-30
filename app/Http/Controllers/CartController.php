<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;

class CartController extends Controller
{
    public function myCart(Request $request) {
        
        $user_id = Auth::id(); 
        
        // Cart Modelからデータを取得する
        $my_carts = Cart::where('user_id',$user_id)->get();
        
        return view('goods.cart', ['my_carts' => $my_carts]);
    }
    
    public function addMycart(Request $request) {
        
       $user_id = Auth::id();
       
       $goods_id = $request->goods_id;

       // Eloquent first() は1モデルインスタンスを返す、1レコードだけ取得(= find() )
       $cart = Cart::where('goods_id',$goods_id)->where('user_id', $user_id)->first();

        if ($cart) {
            $cart->qty+=1;
            $cart->save();
            
        }else{
            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->goods_id = $goods_id;
            $cart->qty = 1;
            $cart->save();
        }
        
        return redirect()->route('mycart')->with('status', 'カートに追加しました！');
        
    }

    public function reduceMyCart(Request $request)
    {
        $user_id = Auth::id(); 
        $goods_id = $request->goods_id;

        // Eloquent first() は1モデルインスタンスを返す、1レコードだけ取得(= find() )
        $cart = Cart::where('goods_id',$goods_id)->where('user_id', $user_id)->first();
        
        if ($cart) {
            if($cart->qty === 1) {
                $cart->delete();
            }else{
                $cart->qty-=1;
                $cart->save();
            }
            
        }

        
        return redirect()->route('mycart')->with('status', 'カートの商品を削除しました！');
    }
    
    // ユーザーの商品一覧画面
    public function myCartList(Request $request)
    {
        // 現在認証されているユーザーのIDを取得
        $user_id = Auth::id();

        // Cart Model の user_id を取得 
        $carts = Cart::where('user_id', $user_id)->get();
        
        
        return view('goods.cartlist', ['carts' => $carts]);
    }

}
