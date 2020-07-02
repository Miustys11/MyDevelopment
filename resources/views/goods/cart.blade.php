@extends('layouts.show')

@section('content')
<div class="container-fluid">
   @if (Session::has('status'))
      <p style="text-align: center;">{{ session('status') }}</p>
   @endif
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
           {{ Auth::guard("user")->user()->name }}さんのカートの中身</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap">

                   @foreach($my_carts as $my_cart)
                        <div class="mycart_box">
                           <p>ユーザーID：{{$my_cart->user_id}}</p>
                           <p>アイテムID：{{$my_cart->goods_id}}</p>
                        </div>
                   @endforeach

               </div>
               <br>
               <a href="/">商品一覧へ</a><br>
               <a href="/mycartlist">カートの中身一覧へ</a>
           </div>
       </div>
   </div>
</div>
@endsection