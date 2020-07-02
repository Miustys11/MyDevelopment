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
                            <div style="width: 65px; height: 30px; margin: 0 auto;">
                                <input type="button" value="-" id="minus">
                                <div id="count" style="display: inline-block;">0</div>
                                <input type="button" value="+" id="plus">
                            </div>
                            <form style="width: 170px; margin: 0 auto;" action="{{ action('CartController@deleteCart') }}" method="post">
                                @csrf
                                {{Form::hidden('goods_id', $cart->goods_id )}}
                                <input type="submit" value="カートの商品を削除する" style="margin-top: 10px;">
                            </form>
                        </div>
                    @endforeach
                    <form class="text-center p-2" style="margin: 0 auto;">
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
<script type="text/javascript">
window.addEventListener("load", function(){
   
   var count = document.getElementById("count");
   var plusbtn = document.getElementById("plus");
   var minusbtn = document.getElementById("minus");
   console.log(count)
   // 初期値
   var number = 0;
   
   // 1ずつ増える
   plusbtn.onclick = function (){
          number ++;
          count.innerHTML = number;
   };
   
   // 1ずつ減る
   minusbtn.onclick = function (){
      
      if (number === 0) {
         number = 0;
         count.innerHTML = number;
      }else{
         number --;
         count.innerHTML = number;
      }
   }
})
    
    
</script>