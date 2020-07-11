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
        
        return view('cart.cart', ['my_carts' => $my_carts]);
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

    public function reduceMyCart(Request $request) {
        
        $user_id = Auth::id(); 
        $goods_id = $request->goods_id;

        // Eloquent first() は1モデルインスタンスを返す、1レコードだけ取得(= find() )
        $cart = Cart::where('goods_id',$goods_id)->where('user_id', $user_id)->first();
        
        if ($cart) {
            if($cart->qty === 1) {
                $cart->delete();
            }else{
                $cart->qty -= 1;
                $cart->save();
            }
            
        }

        
        return redirect()->route('mycart')->with('status', 'カートの商品を削除しました！');
    }
    
    // ユーザーの商品一覧画面
    public function myCartList(Request $request) {
        // 現在認証されているユーザーのIDを取得
        $user_id = Auth::id();

        // Cart Model の user_id と goods_id を取得
        $carts = Cart::where('user_id', $user_id)->get();
        
        $datas = ['0','1','2','3','4','5','6','7','8','9','10'];

        
        return view('cart.cartlist', ['carts' => $carts, 'datas' => $datas]);
    }
    
    
    // カートの数量をアップデート
    public function updateCart(Request $request) {
        
        // 現在認証されているユーザーのIDを取得
        $user_id = Auth::id();
        $goods_id = $request->goods_id;
        
        // Cart Model の user_id を取得
        $carts = Cart::where('user_id', $user_id)->get();
    
        if ($request->qty == "0") { 
            Cart::where('user_id', $user_id)->where('goods_id',$goods_id)->delete();
            return redirect()->route('mycartlist')->with('status', 'カートから商品を削除しました！');
        } else {
            Cart::where('user_id', $user_id)->where('goods_id',$goods_id)->update(['qty' => $request->qty]);
            return redirect('mycartlist');
        }

    }
    
    // カートの商品を消す
    public function deleteCart(Request $request) {
        
        $user_id = Auth::id();
        $goods_id = $request->goods_id;
        $delete = Cart::where('user_id', $user_id)->where('goods_id',$goods_id)->delete();
       
        if($delete > 0){
            return redirect()->route('mycartlist')->with('status', 'カートから一つの商品を削除しました！');
        }else{
            return redirect()->route('mycartlist')->with('status', '削除に失敗しました' + $user_id + $goods_id );
        }
    }

    // Order Complite
    public function complete(Request $request) {
        return view('checkout.thankyou');
    }

}