@extends('layouts.front')

@section('content')
<div class="container-fluid">
    @if (Session::has('status'))
        <p style="text-align: center;">{{ session('status') }}</p>
    @endif
   <div class="">
        <div class="mx-auto">
            <h1 class="text-center font-weight-bold">
            {{ Auth::guard("user")->user()->name }}さんのカートの中身一覧</h1>
            <div class="cart-ocontents">
                <div class="d-flex flex-row flex-wrap">

                    @foreach($carts as $cart)
                        <div class="mycart-box">
                            <p>ユーザーID：{{$cart->user_id}}</p>
                            <p>商品番号：{{$cart->goods_id}}</p>
                            <!--数量変更-->
                            <form action="{{ action('CartController@updateCart') }}" method="post">
                                <table border="0" cellspacing="4" cellpadding="0" class="qty-table">
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
                                <div class="qty-change"><input type="submit" value="変更"></div>
                                {{ csrf_field() }}
                                {{Form::hidden('goods_id', $cart->goods_id )}}
                            </form>
                            <!--数量変更-->
                            <form action="{{ action('CartController@deleteCart') }}" method="post" class="cart-delete">
                                @csrf
                                {{Form::hidden('goods_id', $cart->goods_id )}}
                                <input type="submit" value="カートの商品を削除する">
                            </form>
                        </div>
                    @endforeach
                    
                    <form class="total">
                        <p class="tatal-price">合計金額：1500円</p>  
                    </form>

                    <form class="payment" action="cart/complete" method="post">
                        @csrf
                        <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="{{config('app.STRIPE_API_PUBLIC')}}"
                        data-name="Miustys.com"
                        data-label="Buy ¥1500"
                        data-description="clothes"
                        data-amount="1500"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto"
                        data-currency="JPY">
                        </script>
                    </form>

                </div>
            </div>
            <div class="goods-list">
                <a href="/">商品一覧へ</a>
            </div>
        </div>
   </div>
</div>
@endsection
