@extends('layouts.show')

@section('content')
    <div class="container">
        <div class="body-container">
            <div class="link">
                <ol>
                    <li><a href="{{ action('GoodsController@index') }}">ユニクロTOP</a> ></li>
                    <li><a href="#">WOMANトップ</a> ></li>
                    <li><a href="#">Tシャツ（半袖・タンクトップ）</a> ></li>
                    <li><a href="#">マーセライズコットンボートネックT（半袖）</a></li>
                </ol>
                <div class="detail">
                    <div class="details top" id="top">
                        <div class="goods-name">
                            <h1>{{ $goods->name }}</h1>
                        </div>
                        <div class="description">
                            <p>{{ $goods->description }}</p>
                        </div>
                        <div class="card-body" style="color: red;">
                            {{ $goods->amount }}円
                        </div>
                    </div>
                    <div class="image">
                        <img src="{{ asset('storage/image/'  . $goods->image_path) }}">
                    </div>
                    <div class="details bottom" id="bottom">
                        <div class="select-color">
                            <h1>・カラーを選択</h1>
                        </div>
                        <div class="select-size">
                            <h1>・サイズを選択</h1>
                            <button class="btn">XS</button>
                            <button class="btn">S</button>
                            <button class="btn">M</button><br>
                            <button class="btn">L</button>
                            <button class="btn">XL</button>
                            <button class="btn">2XL</button>
                        </div>
                        <div>
                            <h1 style="font-size: 15px;">・数量を選択</h1>
                            <div class="qty">
                                <input type="button" value="-" id="minus">
                                <div id="count" style="display: inline-block;">0</div>
                                <input type="button" value="+" id="plus">
                            </div>
                        </div>
                        <form action="/mycart" method="post">
                            @csrf
                            <input type="hidden" name="goods_id" value="{{ $goods->id }}">
                            <input type="submit" value="カートに入れる" id="cart">
                        </form>
                        <button id="confirm-stock"><a href="#">店舗の在庫を確認する</a></button>
                        <ul class="link-more">
                            <li><a href="#">はじめてのお客様へ</a></li>
                            <li><a href="#">在庫について</a></li>
                            <li><a href="#">返品・返金・交換について</a></li>
                            <li><a href="#">法人のお客様へ</a></li>
                            <li><a href="#">大量購入希望のお客様へ</a></li>
                        </ul>
                    </div>
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