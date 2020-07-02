@extends('layouts.show')

@section('content')
<div class="container-fluid">
    @if (Session::has('status'))
        <p style="text-align: center;">{{ session('status') }}</p>
    @endif
   <div class="">
        <div class="mx-auto" style="max-width:1200px">
            <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
            {{ Auth::guard("user")->user()->name }}さんのカートの中身一覧</h1>
            <div class="">
                <div class="d-flex flex-row flex-wrap">

                    @foreach($carts as $cart)
                        <div class="mycart_box">
                            <p>ユーザーID：{{$cart->user_id}}</p>
                            <p>アイテムID：{{$cart->goods_id}}</p>
                            <!--数量変更-->
                            <form action="{{ action('CartController@updateCart') }}" method="post">
                                <table border="0" cellspacing="4" cellpadding="0">
                                <tr>
                                <td>数量
                                    <select name="qty">
                                        @foreach($datas as $data)
                                        <option value="{{ $data }}" {{ $cart->qty == $data ? "selected" : "" }}>{{ $data }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                </tr>
                                </table>
                                <input type="submit" value="変更">
                                {{ csrf_field() }}
                                {{Form::hidden('goods_id', $cart->goods_id )}}
                            </form>
                            <!--数量変更-->
                            <form style="width: 170px; margin: 0 auto;" action="{{ action('CartController@deleteCart') }}" method="post">
                                @csrf
                                {{Form::hidden('goods_id', $cart->goods_id )}}
                                <input type="submit" value="カートの商品を削除する" style="margin-top: 10px;">
                            </form>
                        </div>
                    @endforeach
                    
                    <form class="text-center p-2" style="margin: 0 530px;">
                        個数：個<br>
                        <p style="font-size:1.2em; font-weight:bold; margin-bottom: 10px;">合計金額：円</p>  
                    </form>
                    
                    <form style="margin: 0 auto;">
                        @csrf
                        <button type="submit" class="purchase">購入する</button>
                    </form>
                </div>
            </div>
            <div style="width: 75px; margin: 0 auto;">
                <a href="/">商品一覧へ</a>
            </div>
        </div>
   </div>
</div>
@endsection