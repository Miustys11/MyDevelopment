@extends('layouts.show')

@section('content')
<div class="container-fluid">
   @if (Session::has('status'))
      <p style="text-align: center;">{{ session('status') }}</p>
   @endif
   <div class="">
       <div class="mx-auto">
            <h1 class="text-center font-weight-bold">
            {{ Auth::guard("user")->user()->name }}さんのカートの中身</h1>
            <div class="cart">
                <div class="d-flex flex-row flex-wrap">

                    @foreach($my_carts as $my_cart)
                        <div class="mycart_box">
                           <p>ユーザーID：{{$my_cart->user_id}}</p>
                           <p>商品番号：{{$my_cart->goods_id}}</p>
                        </div>
                    @endforeach

                </div>
                <div class="back">
                    <a href="/" class="goods-list">商品一覧へ</a><br>
                    <a href="/mycartlist">カートの中身一覧へ</a>
                </div>
           </div>
       </div>
   </div>
</div>
@endsection