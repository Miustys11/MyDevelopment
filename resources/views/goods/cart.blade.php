@extends('layouts.show')

@section('content')
<div class="container-fluid">
   @if (Session::has('status'))
      <p style="text-align: center;">{{ session('status') }}</p>
   @endif
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
           {{ Auth::user()->name }}さんのカートの中身</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap">

                   @foreach($my_carts as $my_cart)
                        <div class="mycart_box">
                           <p>ユーザーID：{{$my_cart->user_id}}</p>
                           <p>アイテムID：{{$my_cart->goods_id}}</p>
                           <div style="width: 65px; height: 30px; margin: 0 auto;">
                              <input type="button" value="-" id="minus">
                              <div id="count" style="display: inline-block;">0</div>
                              <input type="button" value="+" id="plus">
                           </div>
                        </div>
                   @endforeach

               </div>
               
               <br>
               <a href="/">商品一覧へ</a><br>
               <a href="#">カートの中身一覧へ</a>
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